<?php
namespace App\Filament\Resources;

use App\Filament\Resources\GoodieOrderResource\Pages;
use App\Models\GoodieOrder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class GoodieOrderResource extends Resource
{
    protected static ?string $model = GoodieOrder::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Goodie Orders';
    protected static ?string $navigationGroup = 'Orders';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->columnSpanFull(),
            TextInput::make('email')->email()->required(),
            TextInput::make('roll_number')->label('Roll Number'),
            TextInput::make('phone'),

            Placeholder::make('items_display')
                ->label('Items Ordered')
                ->content(fn ($record) => $record
                    ? collect($record->items)
                        ->map(fn ($item) => ($item['name'] ?? '?') . ' — ' . ($item['price'] ?? ''))
                        ->join("\n")
                    : '—'
                )
                ->columnSpanFull(),

            Textarea::make('notes')->rows(3)->columnSpanFull(),

            Select::make('status')
                ->options([
                    'pending'   => 'Pending',
                    'confirmed' => 'Confirmed',
                    'collected' => 'Collected',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('roll_number')->label('Roll No.'),
                TextColumn::make('items_summary')
                    ->label('Items')
                    ->getStateUsing(fn ($record) =>
                        collect($record->items)
                            ->map(fn ($item) => ($item['name'] ?? '?') . ' (' . ($item['price'] ?? '') . ')')
                            ->join(', ')
                    )
                    ->wrap(),
                TextColumn::make('created_at')->label('Ordered')->dateTime('M j, Y H:i')->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'primary' => 'collected',
                        'danger'  => 'cancelled',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGoodieOrders::route('/'),
            'edit'  => Pages\EditGoodieOrder::route('/{record}/edit'),
        ];
    }
}
