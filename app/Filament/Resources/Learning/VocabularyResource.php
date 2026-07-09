<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\VocabularyResource\Pages;
use App\Models\Learning\Vocabulary;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class VocabularyResource extends Resource
{
    protected static ?string $model = Vocabulary::class;

    protected static ?string $navigationIcon  = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Vocabulary';
    protected static ?int    $navigationSort  = 3;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Primary fields — displayed in content order: Korean, Romanization, Assamese, English
            Grid::make(2)->schema([
                TextInput::make('korean')
                    ->label('Korean (한국어)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('romanization')
                    ->label('Romanization (Revised RR)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('assamese')
                    ->label('Assamese (অসমীয়া)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('english')
                    ->label('English')
                    ->required()
                    ->maxLength(255),

                Select::make('part_of_speech')
                    ->label('Part of Speech')
                    ->options([
                        'noun'        => 'Noun',
                        'verb'        => 'Verb',
                        'adjective'   => 'Adjective',
                        'adverb'      => 'Adverb',
                        'particle'    => 'Particle',
                        'conjunction' => 'Conjunction',
                        'interjection'=> 'Interjection',
                        'pronoun'     => 'Pronoun',
                        'number'      => 'Number',
                        'expression'  => 'Expression',
                    ])
                    ->required(),

                Select::make('level')
                    ->options([
                        'beginner'     => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced'     => 'Advanced',
                    ])
                    ->default('beginner')
                    ->required(),
            ]),

            // Example sentence — same content order
            Grid::make(3)->schema([
                TextInput::make('example_ko')
                    ->label('Example (Korean)')
                    ->maxLength(500),

                TextInput::make('example_as')
                    ->label('Example (Assamese)')
                    ->maxLength(500),

                TextInput::make('example_en')
                    ->label('Example (English)')
                    ->maxLength(500),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Content display order: Korean, Romanization, Assamese, English
                TextColumn::make('korean')
                    ->label('Korean')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('romanization')
                    ->label('Romanization')
                    ->searchable(),
                TextColumn::make('assamese')
                    ->label('Assamese')
                    ->searchable(),
                TextColumn::make('english')
                    ->label('English')
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('part_of_speech')
                    ->label('POS')
                    ->colors([
                        'primary'   => 'noun',
                        'success'   => 'verb',
                        'warning'   => 'adjective',
                        'secondary' => fn ($state) => ! in_array($state, ['noun', 'verb', 'adjective']),
                    ]),
                BadgeColumn::make('level')
                    ->colors([
                        'success' => 'beginner',
                        'warning' => 'intermediate',
                        'danger'  => 'advanced',
                    ]),
            ])
            ->filters([
                SelectFilter::make('level')->options([
                    'beginner'     => 'Beginner',
                    'intermediate' => 'Intermediate',
                    'advanced'     => 'Advanced',
                ]),
                SelectFilter::make('part_of_speech')->label('Part of Speech')->options([
                    'noun'        => 'Noun',
                    'verb'        => 'Verb',
                    'adjective'   => 'Adjective',
                    'adverb'      => 'Adverb',
                    'particle'    => 'Particle',
                    'conjunction' => 'Conjunction',
                    'interjection'=> 'Interjection',
                    'pronoun'     => 'Pronoun',
                    'number'      => 'Number',
                    'expression'  => 'Expression',
                ]),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('korean');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListVocabulary::route('/'),
            'create' => Pages\CreateVocabulary::route('/create'),
            'edit'   => Pages\EditVocabulary::route('/{record}/edit'),
        ];
    }
}
