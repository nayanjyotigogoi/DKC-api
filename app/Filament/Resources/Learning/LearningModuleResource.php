<?php

namespace App\Filament\Resources\Learning;

use App\Filament\Resources\Learning\LearningModuleResource\Pages;
use App\Models\Learning\LearningModule;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class LearningModuleResource extends Resource
{
    protected static ?string $model = LearningModule::class;

    protected static ?string $navigationIcon  = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Learning Management';
    protected static ?string $navigationLabel = 'Modules';
    protected static ?int    $navigationSort  = 1;

    // Only the four permitted roles may see this resource
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

                Select::make('level')
                    ->options([
                        'beginner'     => 'Beginner',
                        'intermediate' => 'Intermediate',
                        'advanced'     => 'Advanced',
                    ])
                    ->default('beginner')
                    ->required(),

                TextInput::make('order_index')
                    ->label('Order')
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
                    ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_index')->label('#')->sortable(),
                TextColumn::make('title_en')->label('Title')->searchable()->sortable(),
                TextColumn::make('title_as')->label('Assamese Title')->searchable(),
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
                TextColumn::make('lessons_count')
                    ->label('Lessons')
                    ->counts('lessons'),
            ])
            ->filters([
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
            ->defaultSort('order_index');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLearningModules::route('/'),
            'create' => Pages\CreateLearningModule::route('/create'),
            'edit'   => Pages\EditLearningModule::route('/{record}/edit'),
        ];
    }
}
