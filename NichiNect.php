<?php

namespace App\Helpers;
use DB;
use \App\Models\User;

/**
* Custom Helper https://github.com/NichiNect
*/

class Helper {
    
    /**
     * Count the balance based on date or category
     */
    public static function balance ($perDate = null, $startDate = null, $categoryId = null) {
        $transactionQuery = DB::table('transactions');

        if ($perDate) {
            $transactionQuery->where('date', '<=', $perDate);
        }
        if ($startDate) {
            $transactionQuery->where('date', '>=', $startDate);
        }
        if ($categoryId) {
            $transactionQuery->where('category_id', $categoryId);
        }

        $transactions = $transactionQuery->where('creator_id', auth()->user()->id)->get();

        return $transactions->sum(function ($transaction) {

            $balance = ($transaction->transaction_status_id == 1) ? $transaction->amount : - $transaction->amount;

            // User::findOrFail(auth()->user()->id)->update([
            //     'balance' => $balance
            // ]);

            return $balance;
        });
    }

    /**
     * Get array of date list.
     *
     * @return array
     */
    public static function getDates () {
        $dates = [];
        foreach (range(1, 31) as $date) {
            $date = str_pad($date, 2, 0, STR_PAD_LEFT);
            $dates[$date] = $date;
        }

        return $dates;
    }

    /**
     * Get Months
     */
    public static function getMonths () {

        return [
            'January', 'February', 'March', 'April', 'May', 'Juni', 'July', 'August', 'September', 'October', 'November', 'December'
        ];
    }

    /**
     * Get Years from 2019
     */
    public static function getYears() {

        $yearRange = range(2019, date('Y'));

        foreach ($yearRange as $year) {
            $years[$year] = $year;
        }

        return $years;
    }
}
