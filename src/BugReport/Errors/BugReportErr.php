<?php

namespace Sherl\Sdk\BugReport\Errors;

class BugReportErr
{
    public const CREATE_BUG_REPORT_FAILED = 'bug-reports/create-bug-report-failed';
    public const CREATE_BUG_REPORT_FORBIDDEN = 'bug-reports/create-bug-report-forbidden';
    public const GET_BUG_REPORTS_FAILED = 'bug-reports/get-bug-reports-failed';
    public const GET_BUG_REPORTS_FORBIDDEN = 'bug-reports/get-bug-reports-forbidden';
    public const GET_BUG_REPORT_BY_ID_FAILED = 'bug-reports/get-bug-report-by-id-failed';
    public const GET_BUG_REPORT_BY_ID_FORBIDDEN = 'bug-reports/get-bug-report-by-id-forbidden';
    public const BUG_REPORT_NOT_FOUND = 'bug-reports/bug-report-not-found';



    /** @var array<string, string>
    */
    public static $errors =  [
         self::CREATE_BUG_REPORT_FAILED => 'Failed to create bug report',
         self::CREATE_BUG_REPORT_FORBIDDEN =>
          'Failed to create bug report, forbidden',
         self::GET_BUG_REPORTS_FAILED => 'Failed to get bug reports',
         self::GET_BUG_REPORTS_FORBIDDEN =>
          'Failed to get bug reports, forbidden',
         self::GET_BUG_REPORT_BY_ID_FAILED => 'Failed to get bug report by id',
         self::GET_BUG_REPORT_BY_ID_FORBIDDEN =>
          'Failed to get bug report by id, forbidden',
         self::BUG_REPORT_NOT_FOUND =>
          'Failed to get bug report, id not found',
        ];
};
