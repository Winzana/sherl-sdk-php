<?php

namespace Sherl\Sdk\VirtualMoney\Errors;

class VirtualMoneyErr
{
    public const VIRTUAL_MONEY_NOT_FOUND = 'virtula-money/not-found';
    public const FIND_ONE_WALLET_FAILED = 'virtual-money/find-one-wallet-failed';
    public const CREDIT_WALLET_FAILED = 'virtual-money/credit-wallet-failed';
    public const DEBIT_WALLET_FAILED = 'virtual-money/debit-wallet-failed';
    public const CREATE_WALLET_FAILED = 'virtual-money/create-wallet-failed';
    public const CREATE_WALLET_HISTORICAL_FAILED = 'virtual-money/create-wallet-historical-failed';
    public const GET_ONE_WALLET_BY_ID_FAILED = 'virtual-money/get-wallet-failed';
    public const GET_WALLET_HISTORICAL_FAILED = 'virtual-money/get-wallet-historical-failed';
    public const CREATE_WALLET_FAILED_CMS_NOT_EXIST = 'virtual-money/create-wallet-failed-cms-not-exist';
    public const CREDIT_WALLET_FAILED_CMS_NOT_EXIST = 'virtual-money/credit-wallet-failed-cms-not-exist';
    public const DEBIT_WALLET_FAILED_CMS_NOT_EXIST = 'virtual-money/debit-wallet-failed-cms-not-exist';
    public const FIND_ONE_WALLET_FAILED_CMS_NOT_EXIST = 'virtual-money/find-one-wallet-cms-not-exist';
    public const GET_ONE_WALLET_BY_ID_FAILED_CMS_NOT_EXIST = 'virtual-money/one-wallet-by-id-cms-not-exist';
    public const GET_WALLET_HISTORICAL_FAILED_CMS_NOT_EXIST = 'virtual-money/get-wallet-historical-cms-not-exist';
    public const CREATE_WALLET_HISTORICAL_FORBIDDEN = 'virtual-money/create-wallet-historical-forbidden';
    public const CREATE_WALLET_FAILED_FORBIDDEN = 'virtual-money/create-wallet-failed-forbidden';
    public const CREDIT_WALLET_FAILED_FORBIDDEN = 'virtual-money/credit-wallet-failed-forbidden';
    public const DEBIT_WALLET_FAILED_FORBIDDEN = 'virtual-money/debit-wallet-failed-forbidden';
    public const FIND_ONE_WALLET_FAILED_FORBIDDEN = 'virtual-money/find-one-wallet-forbidden';
    public const GET_ONE_WALLET_BY_ID_FAILED_FORBIDDEN = 'virtual-money/one-wallet-by-id-forbidden';
    public const GET_WALLET_HISTORICAL_FAILED_FORBIDDEN = 'virtual-money/get-wallet-historical-forbidden';
    public const WALLET_NOT_FOUND = 'virtual-money/wallet-not-found';
    public const WALLET_HISTORICAL_NOT_FOUND = 'virtual-money/wallet-historical-not-found';


    public static $errors = [
      self::VIRTUAL_MONEY_NOT_FOUND => 'Failed to find wallet not found',
      self::FIND_ONE_WALLET_FAILED => 'Failed to find wallet',
      self::CREDIT_WALLET_FAILED => 'Failed to credit wallet',
      self::DEBIT_WALLET_FAILED => 'Failed to debit wallet',
      self::CREATE_WALLET_FAILED => 'Failed to create wallet',
      self::CREATE_WALLET_HISTORICAL_FAILED =>
        'Failed to create wallet historical',
      self::GET_ONE_WALLET_BY_ID_FAILED => 'Failed to get wallet by id',
      self::GET_WALLET_HISTORICAL_FAILED =>
        'Failed to get wallet historical',
      self::CREATE_WALLET_FAILED_CMS_NOT_EXIST =>
        'Failed to create wallet, does not exist',
      self::CREDIT_WALLET_FAILED_CMS_NOT_EXIST => 'Wallet not exist',
      self::DEBIT_WALLET_FAILED_CMS_NOT_EXIST =>
        'Failed to debit wallet, does not exist',
      self::FIND_ONE_WALLET_FAILED_CMS_NOT_EXIST =>
        'Failed to debit one wallet, does not exist',
      self::GET_ONE_WALLET_BY_ID_FAILED_CMS_NOT_EXIST =>
        'Failed to debit one wallet by id, does not exist',
      self::GET_WALLET_HISTORICAL_FAILED_CMS_NOT_EXIST =>
        'Failed to debit get wallet hisotrical, does not exist',
      self::CREATE_WALLET_HISTORICAL_FORBIDDEN =>
        'Failed to debit get wallet hisotrical, forbidden',
      self::CREATE_WALLET_FAILED_FORBIDDEN =>
        'Failed to credit wallet, forbidden',
      self::CREDIT_WALLET_FAILED_FORBIDDEN =>
        'Failed to credit wallet, forbidden',
      self::DEBIT_WALLET_FAILED_FORBIDDEN =>
        'Failed to debit wallet, forbidden',
      self::FIND_ONE_WALLET_FAILED_FORBIDDEN =>
        'Failed to debit one wallet, forbidden',
      self::GET_ONE_WALLET_BY_ID_FAILED_FORBIDDEN =>
        'Failed to debit one wallet by id, forbidden',
      self::GET_WALLET_HISTORICAL_FAILED_FORBIDDEN =>
        'Failed to debit get wallet hisotrical, forbidden',
      self::WALLET_NOT_FOUND =>
        'Failed to create wallet hisotrical, not found',
      self::WALLET_HISTORICAL_NOT_FOUND =>
        'Failed to create wallet hisotrical, not found',
    ];

}
