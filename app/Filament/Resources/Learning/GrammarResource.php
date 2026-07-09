<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\GrammarResource\Pages;
use App\Models\Learning\GrammarPoint;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class GrammarResource extends Resource
{
    protected static ?string $model = GrammarPoint::class;

    protected static ?string $navigationIcon  = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Grammar';
    protected static ?int    $navigationSort  = 4;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Title — Korean first, Assamese, English (content display order)
            Grid::make(3)->schema([
                TextInput::make('title_ko')
                    ->label('Title (Korean)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_as')
                    ->label('Title (Assamese)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255),
            ]),

            Grid::make(2)->schema([
                TextInput::make('pattern_formula')
                    ->label('Pattern Formula')
                    ->required()
                    ->maxLength(500)
                    ->helperText('e.g. [Verb stem] + 고 싶어요'),

                Select::make('category')
                    ->options([
                        'particle'           => 'Particle',
                        'verb-ending'        => 'Verb Ending',
                        'sentence-structure' => 'Sentence Structure',
                        'tense'              => 'Tense',
                        'conjunction'        => 'Conjunction',
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

            // Explanations — Assamese first (primary audience), English second
            Textarea::make('explanation_as')
                ->label('Explanation (Assamese)')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Textarea::make('explanation_en')
                ->label('Explanation (English)')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            // Examples — one per row, each with the 4-language content order
            Repeater::make('examples')
                ->label('Examples')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('korean')
                            ->label('Korean')
                            ->required(),

                        TextInput::make('romanization')
                            ->label('Romanization')
                            ->required(),

                        TextInput::make('assamese')
                            ->label('Assamese')
                            ->required(),

                        TextInput::make('english')
                            ->label('English')
                            ->required(),
                    ]),
                ])
                ->defaultItems(1)
                ->columnSpanFull(),
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
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pattern_formula')
                    ->label('Pattern')
                    ->limit(40),
                BadgeColumn::make('category')
                    ->colors([
                        'primary'   => 'particle',
                        'success'   => 'verb-ending',
                        'warning'   => 'sentence-structure',
                        'secondary' => fn ($state) => ! in_array($state, ['particle', 'verb-ending', 'sentence-structure']),
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
                SelectFilter::make('category')->options([
                    'particle'           => 'Particle',
                    'verb-ending'        => 'Verb Ending',
                    'sentence-structure' => 'Sentence Structure',
                    'tense'              => 'Tense',
                    'conjunction'        => 'Conjunction',
                ]),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('title_en');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListGrammar::route('/'),
            'create' => Pages\CreateGrammar::route('/create'),
            'edit'   => Pages\EditGrammar::route('/{record}/edit'),
        ];
    }
}
