<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\LearningChapterResource\Pages;
use App\Filament\Resources\Learning\LearningChapterResource\RelationManagers;
use App\Models\LearningChapter;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class LearningChapterResource extends Resource
{
    protected static ?string $model = LearningChapter::class;

    protected static ?string $navigationIcon  = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Chapter Learning';
    protected static ?string $navigationLabel = 'Chapters';
    protected static ?int    $navigationSort  = 1;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('number')
                    ->label('Chapter #')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100),

                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_ko')
                    ->label('Title (Korean)')
                    ->required()
                    ->maxLength(255),
            ]),

            Textarea::make('description')
                ->label('Description')
                ->rows(3)
                ->maxLength(1000),

            Grid::make(3)->schema([
                TextInput::make('accent_color')
                    ->label('Accent Color (hex)')
                    ->placeholder('#8B1E24')
                    ->maxLength(20),

                TextInput::make('tint_color')
                    ->label('Tint Color (hex)')
                    ->placeholder('#F9F0F1')
                    ->maxLength(20),

                TextInput::make('border_color')
                    ->label('Border Color (hex)')
                    ->placeholder('#E8CCCF')
                    ->maxLength(20),
            ]),

            Grid::make(2)->schema([
                TextInput::make('icon')
                    ->label('Icon (emoji or text)')
                    ->maxLength(20),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
            ]),

            Toggle::make('is_published')
                ->label('Published')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')
                    ->label('Ch.')
                    ->sortable(),

                TextColumn::make('title_en')
                    ->label('Chapter')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('title_ko')
                    ->label('Korean')
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

                TextColumn::make('items_count')
                    ->label('Items')
                    ->counts('items'),

                TextColumn::make('conversations_count')
                    ->label('Conversations')
                    ->counts('conversations'),

                ToggleColumn::make('is_published')
                    ->label('Published'),
            ])
            ->defaultSort('number')
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
            RelationManagers\ConversationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLearningChapters::route('/'),
            'create' => Pages\CreateLearningChapter::route('/create'),
            'edit'   => Pages\EditLearningChapter::route('/{record}/edit'),
        ];
    }
}
