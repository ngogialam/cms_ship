<?php

/**
 * Validation language strings.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 *
 * @codeCoverageIgnore
 */

return [
	// Core Messages
   'noRuleSets'            => 'No rulesets specified in Validation configuration.',
   'ruleNotFound'          => '{0} is not a valid rule.',
   'groupNotFound'         => '{0} is not a validation rules group.',
   'groupNotArray'         => '{0} rule group must be an array.',
   'invalidTemplate'       => '{0} is not a valid Validation template.',

	// Rule Messages
   'alpha'                 => '{field} chỉ được chứa chữ cái.',
   'alpha_dash'            => '{field} chỉ được chứa chữ cái, số, gạch dưới và dấu gạch ngang.',
   'alpha_numeric'         => '{field} chỉ được chứa chữ cái và số.',
   'alpha_numeric_punct'   => 'The {field} field may contain only alphanumeric characters, spaces, and  ~ ! # $ % & * - _ + = | : . characters.',
   'alpha_numeric_space'   => 'The {field} field may only contain alphanumeric and space characters.',
   'alpha_space'           => 'The {field} field may only contain alphabetical characters and spaces.',
   'decimal'               => '{field} phải là số thập phân.',
   'differs'               => 'The {field} field must differ from the {param} field.',
   'equals'                => '{field} phải có chính xác: {param} ký tự.',
   'exact_length'          => '{field} phải có độ dài {param} ký tự.',
   'greater_than'          => '{field} phải lớn hơn {param}.',
   'greater_than_equal_to' => 'The {field} field must contain a number greater than or equal to {param}.',
   'hex'                   => 'The {field} field may only contain hexidecimal characters.',
   'in_list'               => 'The {field} field must be one of: {param}.',
   'integer'               => '{field} phải là kiểu số nguyên.',
   'is_natural'            => '{field} phải là số dương.',
   'is_natural_no_zero'    => '{field} phải là số dương khác không.',
   'is_not_unique'         => 'The {field} field must contain a previously existing value in the database.',
   'is_unique'             => '{field} phải là số duy nhất.',
   'less_than'             => '{field} phải nhỏ hơn {param}.',
   'less_than_equal_to'    => 'The {field} field must contain a number less than or equal to {param}.',
   // 'matches'               => '{field} không trùng với {param}.',
   'matches'               => 'Nhập lại mật khẩu không khớp.',
   'max_length'            => '{field} phải có độ dài nhỏ hơn hoặc bằng {param} ký tự.',
   'min_length'            => '{field} phải có độ dài lớn hơn hoặc bằng {param} ký tự.',
   'not_equals'            => 'The {field} field cannot be: {param}.',
   'numeric'               => '{field} không đúng dịnh dạng số.',
   'regex_match'           => '{field} không đúng định dạng.',
   'required'              => '{field} không được để trống.',
   'required_with'         => 'The {field} field is required when {param} is present.',
   'required_without'      => 'The {field} field is required when {param} is not present.',
   'string'                => 'The {field} field must be a valid string.',
   'timezone'              => 'The {field} field must be a valid timezone.',
   'valid_base64'          => 'The {field} field must be a valid base64 string.',
   'valid_email'           => '{field} không đúng định dạng.',
   'valid_emails'          => '{field} không đúng định dạng email.',
   'valid_ip'              => '{field} không đúng định dạng IP.',
   'valid_url'             => '{field} không đúng định dạng URL.',
   'valid_date'            => 'The {field} field must contain a valid date.',

	// Credit Cards
   'valid_cc_num'          => '{field} does not appear to be a valid credit card number.',

	// Files
   'uploaded'              => '{field} is not a valid uploaded file.',
   'max_size'              => '{field} is too large of a file.',
   'is_image'              => '{field} is not a valid, uploaded image file.',
   'mime_in'               => '{field} does not have a valid mime type.',
   'ext_in'                => '{field} does not have a valid file extension.',
   'max_dims'              => '{field} is either not an image, or it is too wide or tall.',

   //Customize errors
   'phoneValidate'          => 'Số điện thoại không hợp lệ.',
   'passwordValidate'       => 'Mật khẩu từ 8 - 15 ký tự và phải có ít nhất 1 ký tự đặc biệt, in hoa, chữ thường, ký tự số.',
   'legalsAndRulesValidate' => 'Bạn chưa chọn đồng ý với điều khoản và chính sách của HolaShip.',
   'minFullName'            => 'Họ và tên không hợp lệ.',
   'checkNumberRemain'      => 'Số tiền muốn rút vượt quá số dư có thể rút',
   'checkMaxAmount'         => 'Số tiền rút tối đa {param}',
   'checkMinAmount'         => 'Số tiền rút tối thiểu {param}',
   'checkPickupType' => 'Sai định dạng kiểu mang hàng ra bưu cục',
   'checkpaymentType' => 'Sai định dạng hình thức thanh toán phí',
   'checkweight' => 'Khối lượng phải là số',
   'checklength' => 'Chiều dài phải là số',
   'checkwidth' => 'Chiều rộng phải là số',
   'checkheight' => 'Chiều cao phải là số',
   'checksumPriceOrder' => 'Tổng giá trị tiền hàng phải là số',
   'checkpackageCode' => ' Gói cước vận chuyển ',
   'checkorderPayment' => ' Người trả phí ',
   'checkpaymentTypeRe' => 'Hình thức thanh toán phí',
   'checkpartialDelivery' => 'Giao hàng 1 phần',
   'countCharacter' => '{field} phải có độ dài nhỏ hơn hoặc bằng 200 ký tự.',
   'checkweightNull' => '{field} phải lớn hơn 0',

   'lbl_frontBsRegisErr' => 'Ảnh đăng ký doanh nghiệp mặt trước không đc để trống',
   'lbl_backBsRegisErr' => 'Ảnh đăng ký doanh nghiệp mặt sau không đc để trống',
   'lbl_BsRegisErr' => 'Ảnh đăng ký doanh nghiệp không đc để trống',
   'lbl_frontCidErr' => 'Ảnh CMTND/CCCD mặt trước không đc để trống',
   'lbl_backCidErr' => 'Ảnh CMTND/CCCD mặt sau không đc để trống',
   
   'lbl_maxTypeImg' => 'Chỉ cho phép chọn định dạng ảnh: jpg, jpeg, png.',
   'lbl_maxSizeImg' => 'Ảnh vượt quá dung lượng tối đa 2 MB.',
];
