<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\QuizQuestionResource\Pages;
use App\Models\Learning\QuizQuestion;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class QuizQuestionResource extends Resource
{
    protected static ?string $model = QuizQuestion::class;

    protected static ?string $navigationIcon  = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Quiz Questions';
    protected static ?int    $navigationSort  = 6;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                Select::make('type')
                    ->options([
                        'multiple_choice' => 'Multiple Choice',
                        'fill_in_blank'   => 'Fill in the Blank',
                        'matching'        => 'Matching',
                        'listening'       => 'Listening',
                    ])
                    ->required()
                    ->default('multiple_choice'),

                TextInput::make('correct_index')
                    ->label('Correct answer index (0-based)')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('0 = first option, 1 = second option, etc.'),
            ]),

            Textarea::make('question_text')
                ->label('Question')
                ->required()
                ->rows(2)
                ->columnSpanFull(),

            // Answer options — text and optional romanization
            Repeater::make('options')
                ->label('Answer Options')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('text')->label('Option Text')->required(),
                        TextInput::make('romanization')->label('Romanization (optional)'),
                    ]),
                ])
                ->defaultItems(4)
                ->minItems(2)
                ->columnSpanFull(),

            // Explanations (shown after answering)
            Grid::make(2)->schema([
                Textarea::make('explanation_as')
                    ->label('Explanation (Assamese)')
                    ->rows(2),
                Textarea::make('explanation_en')
                    ->label('Explanation (English)')
                    ->rows(2),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question_text')
                    ->label('Question')
                    ->limit(60)
                    ->searchable(),
                BadgeColumn::make('type')
                    ->colors([
                        'primary'   => 'multiple_choice',
                        'success'   => 'fill_in_blank',
                        'warning'   => 'matching',
                        'secondary' => 'listening',
                    ]),
                TextColumn::make('correct_index')
                    ->label('Correct')
                    ->formatStateUsing(fn ($state) => 'Option ' . ($state + 1)),
                TextColumn::make('created_at')->label('Added')->date('d M Y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')->options([
                    'multiple_choice' => 'Multiple Choice',
                    'fill_in_blank'   => 'Fill in the Blank',
                    'matching'        => 'Matching',
                    'listening'       => 'Listening',
                ]),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListQuizQuestions::route('/'),
            'create' => Pages\CreateQuizQuestion::route('/create'),
            'edit'   => Pages\EditQuizQuestion::route('/{record}/edit'),
        ];
    }
}
