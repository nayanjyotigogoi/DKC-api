<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\ConversationResource\Pages;
use App\Models\Learning\Conversation;
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

class ConversationResource extends Resource
{
    protected static ?string $model = Conversation::class;

    protected static ?string $navigationIcon  = 'heroicon-o-chat';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Conversations';
    protected static ?int    $navigationSort  = 5;

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManageLearning() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Titles — Korean, Assamese, English (content display order)
            Grid::make(3)->schema([
                TextInput::make('title_ko')->label('Title (Korean)')->required()->maxLength(255),
                TextInput::make('title_as')->label('Title (Assamese)')->required()->maxLength(255),
                TextInput::make('title_en')->label('Title (English)')->required()->maxLength(255),
            ]),

            // Scene description
            Grid::make(2)->schema([
                Textarea::make('scene_as')->label('Scene description (Assamese)')->rows(2)->required(),
                Textarea::make('scene_en')->label('Scene description (English)')->rows(2)->required(),
            ]),

            Grid::make(2)->schema([
                Select::make('level')
                    ->options([
                        'beginner'     => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced'     => 'Advanced',
                    ])
                    ->default('beginner')
                    ->required(),
            ]),

            // Speakers definition
            Repeater::make('speakers')
                ->label('Speakers')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('label')->required()->placeholder('A, Customer, Student…'),
                        Select::make('gender')
                            ->options(['male' => 'Male', 'female' => 'Female'])
                            ->required(),
                    ]),
                ])
                ->defaultItems(2)
                ->columnSpanFull(),

            // Dialogue lines — each line has the 4-field content order
            Repeater::make('lines')
                ->label('Dialogue Lines')
                ->relationship()
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('speaker_label')
                            ->label('Speaker')
                            ->required()
                            ->placeholder('A / Customer'),
                        TextInput::make('order_index')
                            ->label('Order')
                            ->numeric()
                            ->default(0),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('text_ko')
                            ->label('Korean')
                            ->required(),
                        TextInput::make('romanization')
                            ->label('Romanization')
                            ->required(),
                        TextInput::make('translation_as')
                            ->label('Assamese')
                            ->required(),
                        TextInput::make('translation_en')
                            ->label('English')
                            ->required(),
                    ]),
                ])
                ->orderColumn('order_index')
                ->defaultItems(2)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Korean title first (content display order)
                TextColumn::make('title_ko')->label('Korean Title')->searchable()->weight('bold'),
                TextColumn::make('title_en')->label('English Title')->searchable()->sortable(),
                TextColumn::make('lines_count')->label('Lines')->counts('lines'),
                BadgeColumn::make('level')
                    ->colors([
                        'success' => 'beginner',
                        'warning' => 'intermediate',
                        'danger'  => 'advanced',
                    ]),
                TextColumn::make('created_at')->label('Created')->date('d M Y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('level')->options([
                    'beginner'     => 'Beginner',
                    'intermediate' => 'Intermediate',
                    'advanced'     => 'Advanced',
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
            'index'  => Pages\ListConversations::route('/'),
            'create' => Pages\CreateConversation::route('/create'),
            'edit'   => Pages\EditConversation::route('/{record}/edit'),
        ];
    }
}
