<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PressMentionResource\Pages;
use App\Models\PressMention;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PressMentionResource extends Resource
{
    protected static ?string $model = PressMention::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Featured In';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Article Headline')
                ->required()
                ->columnSpanFull(),
            TextInput::make('source_name')
                ->label('Publication / Source Name')
                ->required()
                ->placeholder('e.g. Donga Sports, Pratidin, G-Enews'),
            TextInput::make('source_url')
                ->label('Article URL')
                ->url()
                ->placeholder('https://'),
            Select::make('language')
                ->options([
                    'Korean'   => 'Korean (한국어)',
                    'Assamese' => 'Assamese (অসমীয়া)',
                    'English'  => 'English',
                    'Hindi'    => 'Hindi (हिंदी)',
                ])
                ->required()
                ->default('English'),
            DatePicker::make('published_date')->label('Published Date'),
            Toggle::make('is_featured')->label('Pin to top'),
            TextInput::make('sort_order')->numeric()->default(0),
            FileUpload::make('image_path')
                ->label('Article Image / Screenshot')
                ->disk('press')
                ->image()
                ->maxSize(5120)
                ->columnSpanFull()
                ->helperText('Upload a screenshot or photo of the article. Max 5MB.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->disk('press')->label('Image')->width(60)->height(40),
                TextColumn::make('title')->limit(50)->searchable(),
                TextColumn::make('source_name')->sortable(),
                TextColumn::make('language'),
                TextColumn::make('published_date')->date('M j, Y')->sortable(),
                IconColumn::make('is_featured')->boolean()->label('Pinned'),
            ])
            ->defaultSort('sort_order')
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPressMentions::route('/'),
            'create' => Pages\CreatePressMention::route('/create'),
            'edit'   => Pages\EditPressMention::route('/{record}/edit'),
        ];
    }
}
