<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\LessonResource\Pages;
use App\Models\Learning\Lesson;
use App\Models\Learning\LearningModule;
use App\Models\Learning\Vocabulary;
use App\Models\Learning\GrammarPoint;
use App\Models\Learning\Conversation;
use App\Models\Learning\QuizQuestion;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon  = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Lessons';
    protected static ?int    $navigationSort  = 2;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_as')
                    ->label('Title (Assamese)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('URL-friendly identifier, e.g. greetings-and-introductions'),

                Select::make('module_id')
                    ->label('Module')
                    ->options(LearningModule::orderBy('order_index')->pluck('title_en', 'id'))
                    ->required()
                    ->searchable(),

                Select::make('level')
                    ->options([
                        'beginner'     => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced'     => 'Advanced',
                    ])
                    ->default('beginner')
                    ->required(),

                TextInput::make('order_index')
                    ->label('Order within module')
                    ->numeric()
                    ->default(1)
                    ->required(),

                Select::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'archived'  => 'Archived',
                    ])
                    ->default('draft')
                    ->required()
                    ->helperText('Use the Publish button to publish — it validates content first.'),
            ]),

            // Vocabulary attached to this lesson
            Select::make('vocabulary_ids')
                ->label('Vocabulary')
                ->multiple()
                ->relationship('vocabulary', 'korean')
                ->getOptionLabelFromRecordUsing(fn (Vocabulary $record) => "{$record->korean} — {$record->english}")
                ->preload()
                ->columnSpanFull(),

            // Grammar attached to this lesson
            Select::make('grammar_ids')
                ->label('Grammar Points')
                ->multiple()
                ->relationship('grammar', 'title_en')
                ->preload()
                ->columnSpanFull(),

            // Conversations attached to this lesson
            Select::make('conversation_ids')
                ->label('Conversations')
                ->multiple()
                ->relationship('conversations', 'title_en')
                ->preload()
                ->columnSpanFull(),

            // Quiz questions attached to this lesson
            Select::make('quiz_question_ids')
                ->label('Quiz Questions')
                ->multiple()
                ->relationship('quizQuestions', 'question_text')
                ->preload()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_index')->label('#')->sortable(),
                TextColumn::make('title_en')->label('Title')->searchable()->sortable(),
                TextColumn::make('module.title_en')->label('Module')->sortable(),
                BadgeColumn::make('level')
                    ->colors([
                        'success' => 'beginner',
                        'warning' => 'intermediate',
                        'danger'  => 'advanced',
                    ]),
                BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'draft',
                        'success'   => 'published',
                        'danger'    => 'archived',
                    ]),
                TextColumn::make('vocabulary_count')
                    ->label('Vocab')
                    ->counts('vocabulary'),
                TextColumn::make('grammar_count')
                    ->label('Grammar')
                    ->counts('grammar'),
                TextColumn::make('conversations_count')
                    ->label('Conv')
                    ->counts('conversations'),
                TextColumn::make('quiz_questions_count')
                    ->label('Quiz')
                    ->counts('quizQuestions'),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('module')->relationship('module', 'title_en'),
                SelectFilter::make('level')->options([
                    'beginner'     => 'Beginner',
                    'intermediate' => 'Intermediate',
                    'advanced'     => 'Advanced',
                ]),
                SelectFilter::make('status')->options([
                    'draft'     => 'Draft',
                    'published' => 'Published',
                    'archived'  => 'Archived',
                ]),
            ])
            ->actions([
                // Inline publish / unpublish toggle
                TableAction::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Lesson $record) => $record->status !== 'published')
                    ->requiresConfirmation()
                    ->action(function (Lesson $record) {
                        if (! $record->isPublishable()) {
                            Notification::make()
                                ->title('Cannot publish')
                                ->body('Lesson needs vocabulary, grammar, conversations, and quiz questions before it can be published.')
                                ->danger()
                                ->send();
                            return;
                        }
                        $record->update([
                            'status'       => 'published',
                            'published_at' => now(),
                        ]);
                        Notification::make()
                            ->title('Lesson published')
                            ->success()
                            ->send();
                    }),

                TableAction::make('unpublish')
                    ->label('Unpublish')
                    ->icon('heroicon-o-eye-off')
                    ->color('warning')
                    ->visible(fn (Lesson $record) => $record->status === 'published')
                    ->requiresConfirmation()
                    ->action(function (Lesson $record) {
                        $record->update(['status' => 'draft']);
                        Notification::make()
                            ->title('Lesson moved to draft')
                            ->success()
                            ->send();
                    }),

                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('order_index');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit'   => Pages\EditLesson::route('/{record}/edit'),
        ];
    }
}
