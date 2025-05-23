<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DetailDataDonatur;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $jumlahDonaturBaru = DetailDataDonatur::where('status', 'success')
                ->whereMonth('tanggal_transaksi', Carbon::now()->month)
                ->whereYear('tanggal_transaksi', Carbon::now()->year)
                ->count();

            $view->with('jumlahDonaturBaru', $jumlahDonaturBaru);
        });
    }
}
