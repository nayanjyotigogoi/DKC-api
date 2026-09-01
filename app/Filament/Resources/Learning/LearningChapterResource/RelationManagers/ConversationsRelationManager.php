<?php

namespace App\Filament\Resources\Learning\LearningChapterResource\RelationManagers;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class ConversationsRelationManager extends RelationManager
{
    protected static string $relationship = 'conversations';
    protected static ?string $title = 'Conversation Lines';
    protected static ?string $recordTitleAttribute = 'korean';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                Select::make('speaker')
                    ->label('Speaker')
                    ->options([
                        'A' => 'Person A (left / question)',
                        'B' => 'Person B (right / answer)',
                    ])
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
            ]),

            Textarea::make('korean')
                ->label('Korean (한국어) ★')
                ->required()
                ->rows(2)
                ->helperText('The Korean text displayed and spoken by default.'),

            TextInput::make('speak_text')
                ->label('TTS Override (optional)')
                ->maxLength(500)
                ->helperText('Fill only if audio should say something different from the Korean field.'),

            Textarea::make('english')
                ->label('English translation')
                ->rows(2),

            Textarea::make('assamese')
                ->label('Assamese translation (অসমীয়া)')
                ->rows(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable(),

                BadgeColumn::make('speaker')
                    ->colors([
                        'primary' => 'A',
                        'success' => 'B',
                    ]),

                TextColumn::make('korean')
                    ->label('Korean')
                    ->searchable()
                    ->weight('bold')
                    ->limit(60),

                TextColumn::make('english')
                    ->label('English')
                    ->limit(60)
                    ->toggleable(),

                TextColumn::make('assamese')
                    ->label('Assamese')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('speak_text')
                    ->label('TTS Override')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('—'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
