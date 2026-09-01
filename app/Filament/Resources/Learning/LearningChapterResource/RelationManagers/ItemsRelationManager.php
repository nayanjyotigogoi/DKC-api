<?php

namespace App\Filament\Resources\Learning\LearningChapterResource\RelationManagers;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';
    protected static ?string $title = 'Chapter Items (Vowels / Consonants / Words…)';
    protected static ?string $recordTitleAttribute = 'korean';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                Select::make('section')
                    ->label('Section')
                    ->options([
                        'basic'    => 'Basic',
                        'compound' => 'Compound / Double',
                        'tense'    => 'Tense / Double Consonants',
                        'extra'    => 'Extra',
                    ])
                    ->default('basic')
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
            ]),

            Grid::make(2)->schema([
                TextInput::make('korean')
                    ->label('Korean (한국어) ★')
                    ->required()
                    ->maxLength(50)
                    ->helperText('The character or word shown on the card (e.g. ㅏ, 안녕하세요)'),

                TextInput::make('speak_text')
                    ->label('TTS Override (optional)')
                    ->maxLength(255)
                    ->helperText('Leave blank to speak the Korean field directly. Fill in only if you want the audio to say something different (e.g. full syllable for a standalone consonant).'),
            ]),

            Grid::make(3)->schema([
                TextInput::make('romanization')
                    ->label('Romanization')
                    ->required()
                    ->maxLength(100),

                TextInput::make('english')
                    ->label('Sound / English meaning')
                    ->required()
                    ->maxLength(255),

                TextInput::make('assamese')
                    ->label('Assamese (অসমীয়া)')
                    ->maxLength(255),
            ]),

            Toggle::make('is_active')
                ->label('Active (show on site)')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable(),

                BadgeColumn::make('section')
                    ->colors([
                        'primary' => 'basic',
                        'success' => 'compound',
                        'warning' => 'tense',
                        'secondary' => 'extra',
                    ]),

                TextColumn::make('korean')
                    ->label('Korean')
                    ->searchable()
                    ->weight('bold')
                    ->size('lg'),

                TextColumn::make('romanization')
                    ->label('Romanization')
                    ->searchable(),

                TextColumn::make('english')
                    ->label('Sound / Meaning')
                    ->searchable(),

                TextColumn::make('assamese')
                    ->label('Assamese')
                    ->toggleable(),

                TextColumn::make('speak_text')
                    ->label('TTS Override')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('—'),

                ToggleColumn::make('is_active')
                    ->label('Active'),
            ])
            ->filters([
                SelectFilter::make('section')->options([
                    'basic'    => 'Basic',
                    'compound' => 'Compound',
                    'tense'    => 'Tense',
                    'extra'    => 'Extra',
                ]),
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
