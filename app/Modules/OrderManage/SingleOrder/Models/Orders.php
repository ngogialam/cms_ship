<?php
namespace App\Modules\OrderManage\SingleOrder\Models;
/**
 * PHP Data Orders
 * 
 * Create by QTA
 * Date: 2021-07-30 09:50:00
 */
class Orders
{
    private $packType;
    private $packCode;
    private $shopID;
	private $shopOrderCode;
    private $pickupAddressId;
	private $pickName;
	private $pickPhone;
	private $pickAddress;
	private $pickProvince;
	private $pickDistrict;
	private $pickWard;
	private $expectShipperPhone;
	private $pickupType;
	private $deliveryPoint;

    public function __construct($packType = '', $packCode = '', $shopID = '', $shopOrderCode = '', $pickupAddressId = '', $pickName = '', $pickPhone = '', $pickAddress = '', $pickProvince = '', $pickDistrict = '', $pickWard = '', $expectShipperPhone = '', $pickupType = '', $deliveryPoint = '')
    {
        $this->packType = $packType;
        $this->packCode = $packCode;
        $this->shopID = $shopID;
        $this->shopOrderCode = $shopOrderCode;
        $this->pickupAddressId = $pickupAddressId;
        $this->pickName = $pickName;
        $this->pickPhone = $pickPhone;
        $this->pickAddress = $pickAddress;
        $this->pickProvince = $pickProvince;
        $this->pickDistrict = $pickDistrict;
        $this->pickWard = $pickWard;
        $this->expectShipperPhone = $expectShipperPhone;
        $this->pickupType = $pickupType;
        $this->deliveryPoint = $deliveryPoint;
    }
    
    public function getPackType()
    {
        return $this->packType;
    }
    public function setPackType($packType)
    {
        $this->packType = $packType;
    }

    public function getPackCode()
    {
        return $this->packCode;
    }
    public function setPackCode($packCode)
    {
        $this->packCode = $packCode;
    }

    public function getShopID()
    {
        return $this->shopID;
    }
    public function setShopID($shopID)
    {
        $this->shopID = $shopID;
    }
}