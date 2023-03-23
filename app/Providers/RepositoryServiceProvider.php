<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\SubArea;
use App\Models\LoanAdjustment;
use App\Repository\Interfaces\BookingInterface;
use App\Repository\Repos\BookingRepo;
use App\Repository\Repos\AdminRepo;
use App\Repository\Repos\MerchantRepo;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\AdminInterface;
use App\Repository\Interfaces\MerchantInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            AdminInterface::class,
            AdminRepo::class
        );
        $this->app->bind(
            BankInterface::class,
            BankRepo::class
        );
        $this->app->bind(
            CityTypeInterface::class,
            CityTypeRepo::class
        );
        $this->app->bind(
            AreaInterface::class,
            AreaRepo::class
        );
        $this->app->bind(
            SubAreaInterface::class,
            SubAreaRepo::class
        );
        $this->app->bind(
            LocationInterface::class,
            LocationRepo::class
        );
        $this->app->bind(
            ParcelTypeInterface::class,
            ParcelTypeRepo::class
        );
        $this->app->bind(
            MerchantInterface::class,
            MerchantRepo::class
        );
        $this->app->bind(
            BookingInterface::class,
            BookingRepo::class
        );
        $this->app->bind(
            WeightRangeInterface::class,
            WeightRepo::class
        );
        $this->app->bind(
            HubInterface::class,
            HubRepo::class
        );
        $this->app->bind(
            RiderInterface::class,
            RiderRepo::class
        );
        $this->app->bind(
            DeliveryChargeInterface::class,
            DeliveryChargeRepo::class
        );
        $this->app->bind(
            ParcelInterface::class,
            ParcelRepo::class
        );
        $this->app->bind(
            PickupRequestInterface::class,
            PickupRequestRepo::class
        );
        $this->app->bind(
            MerchantPickupMethodInterface::class,
            MerchantPickupMethodRepo::class
        );
        $this->app->bind(
            PaymentMethodInterface::class,
            PaymentMethodRepo::class
        );
        $this->app->bind(
            MerchantBankAccountInterface::class,
            MerchantBankAccountRepo::class
        );
        $this->app->bind(
            ReasonInterface::class,
            ReasonRepo::class
        );
        $this->app->bind(
            ExpenseInterface::class,
            ExpenseRepository::class
        );
        $this->app->bind(
            CollectionInterface::class,
            CollectionRepo::class
        );
        $this->app->bind(
            InvoiceInterface::class,
            InvoiceRepo::class
        );

        $this->app->bind(
            RiderCollectionInterface::class,
            RiderCollectionRepo::class
        );
        $this->app->bind(
            ExpenseHeadInterface::class,
            ExpenseHeadRepo::class
        );
        $this->app->bind(
            AssignAreaInterface::class,
            AssignAreaRepo::class
        );
        $this->app->bind(
            MerchantMobileBankingInterface::class,
            MerchantMobileBankingRepo::class
        );
        $this->app->bind(
            MerchantBankInterface::class,
            MerchantBankRepo::class
        );
        $this->app->bind(
            MobileBankingCollectionInterface::class,
            MobileBankingCollectionRepo::class
        );
        $this->app->bind(
            ParcelTimeInterface::class,
            ParcelTimeRepo::class
        );
        $this->app->bind(
            FileInterface::class,
            FileRepo::class
        );
        $this->app->bind(
            ParcelTransferInterface::class,
            ParcelTransferRepo::class
        );
        $this->app->bind(
            AdvanceInterface::class,
            AdvanceRepo::class
        );

        $this->app->bind(
            ParcelNoteInterface::class,
            ParcelNoteRepo::class
        );

        $this->app->bind(
            LoanInterface::class,
            LoanRepo::class
        );

        $this->app->bind(
            LoanAdjustmentInterface::class,
            LoanAdjustmentRepo::class
        );
        $this->app->bind(
            PermissionInterface::class,
            PermissionRepo::class
        );
        $this->app->bind(
            RoleInterface::class,
            RoleRepo::class
        );
        $this->app->bind(
            BadDebtInterface::class,
            BadDebtRepo::class
        );
        $this->app->bind(
            BadDebtAdjustInterface::class,
            BadDebtAdjustRepo::class
        );
        $this->app->bind(
            StatusMeaningInterface::class,
            StatusMeaningRepo::class
        );
        $this->app->bind(
            CancleInvoiceInterface::class,
            CancleInvoiceRepo::class
        );

    }
}
