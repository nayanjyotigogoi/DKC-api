<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\Member;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class TeamMemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $navigationIcon  = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Core Team';
    protected static ?string $navigationGroup = 'Members';
    protected static ?string $slug            = 'team-members';
    protected static ?int    $navigationSort  = 1;

    /** Always scope to team members only */
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('is_team', true);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->label('Full Name')
                ->columnSpan(1),

            TextInput::make('initials')
                ->maxLength(4)
                ->required()
                ->label('Initials (2–4 chars)')
                ->helperText('Shown on the avatar circle, e.g. SB')
                ->columnSpan(1),

            TextInput::make('role')
                ->required()
                ->label('Position / Role')
                ->placeholder('e.g. President')
                ->columnSpan(1),

            TextInput::make('korean_role')
                ->label('Role in Korean')
                ->placeholder('e.g. 회장')
                ->columnSpan(1),

            TextInput::make('department')
                ->label('Department / Course')
                ->placeholder('e.g. B.A. English, 3rd Year')
                ->columnSpan(1),

            TextInput::make('color')
                ->label('Avatar Background Colour')
                ->placeholder('#8B1E24')
                ->helperText('HEX colour code for the initials circle')
                ->columnSpan(1),

            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->label('Display Order')
                ->helperText('Lower number = shown first')
                ->columnSpan(1),

            Toggle::make('is_active')
                ->label('Visible on website')
                ->default(true)
                ->columnSpan(1),

            // Always true for this resource — hidden from form
            Toggle::make('is_team')
                ->default(true)
                ->hidden()
                ->dehydrated(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('initials')
                    ->label('')
                    ->formatStateUsing(fn ($state, $record) =>
                        "<div style=\"width:38px;height:38px;border-radius:50%;background:{$record->color};display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:13px;\">{$state}</div>"
                    )
                    ->html(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('role')
                    ->label('Position')
                    ->description(fn ($record) => $record->korean_role ?? ''),

                TextColumn::make('department')
                    ->label('Dept / Course')
                    ->wrap(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Visible'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit'   => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }

    // Super Admin only
    public static function canViewAny(): bool    { return auth()->user()?->isSuperAdmin() ?? false; }
    public static function canCreate(): bool     { return auth()->user()?->isSuperAdmin() ?? false; }
    public static function canEdit($record): bool    { return auth()->user()?->isSuperAdmin() ?? false; }
    public static function canDelete($record): bool  { return auth()->user()?->isSuperAdmin() ?? false; }
}
