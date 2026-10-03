<?php

namespace App\Filament\Resources\Learning\LearningChapterResource\RelationManagers;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class RichConversationsRelationManager extends RelationManager
{
    protected static string $relationship = 'richConversations';
    protected static ?string $title       = 'Conversations';
    protected static ?string $recordTitleAttribute = 'title_en';

    public static function canViewForRecord(\Illuminate\Database\Eloquent\Model $ownerRecord): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([

            // Titles
            Grid::make(3)->schema([
                TextInput::make('title_ko')->label('Title — Korean (한국어)')->required(),
                TextInput::make('title_en')->label('Title — English')->required(),
                TextInput::make('title_as')->label('Title — Assamese (অসমীয়া)')->required(),
            ]),

            // Scene descriptions
            Grid::make(2)->schema([
                Textarea::make('scene_en')->label('Scene — English')->rows(2)->required(),
                Textarea::make('scene_as')->label('Scene — Assamese')->rows(2)->required(),
            ]),

            // Dialogue lines
            Repeater::make('lines')
                ->label('Dialogue Lines')
                ->relationship()
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('speaker_label')
                            ->label('Speaker name')
                            ->required()
                            ->placeholder('Pema / Jung Kook'),
                        TextInput::make('order_index')
                            ->label('Order')
                            ->numeric()
                            ->default(0),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('text_ko')
                            ->label('Korean (한국어)')
                            ->required(),
                        TextInput::make('romanization')
                            ->label('Romanization')
                            ->required(),
                        TextInput::make('translation_en')
                            ->label('English')
                            ->required(),
                        TextInput::make('translation_as')
                            ->label('Assamese (অসমীয়া)')
                            ->required(),
                    ]),
                ])
                ->defaultItems(2)
                ->columnSpanFull()
                ->createItemButtonLabel('Add line'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_ko')
                    ->label('Korean Title')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('title_en')
                    ->label('English Title')
                    ->searchable(),
                TextColumn::make('title_as')
                    ->label('Assamese Title')
                    ->toggleable(),
                TextColumn::make('lines_count')
                    ->label('Lines')
                    ->counts('lines'),
                TextColumn::make('scene_en')
                    ->label('Scene')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
