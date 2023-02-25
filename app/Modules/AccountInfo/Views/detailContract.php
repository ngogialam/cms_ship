<style>
.detailContract {
    padding: 0 5%;
}
</style>
<div class="detailContract container" style="background:white; margin-top: 25px;">
    <div>
        <?php
        $representative = ($dataAccount->contractType == 1)  ? $dataAccount->representativePerson : $dataAccount->representative;
        $words = explode(" ", $representative);
        $acronym = "";
        
        foreach ($words as $w) {
            $acronym .= $w[0];
        }

        $companyName = ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company;
        $position = ($dataAccount->contractType == 2)  ? $dataAccount->businessPosition : $dataAccount->personPosition;
        $address = ($dataAccount->contractType == 2)  ? $dataAccount->addressByBR : $dataAccount->addressByID;
        $dob = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personDob;
        $cid = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personId;
        $cidDate = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdDate;
        $cidPlace = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdAddress;
        $phone = ($dataAccount->contractType == 2)  ? $dataAccount->bsPhone : $dataUser->phoneOTP;
        $tax = ($dataAccount->contractType == 2)  ? $dataAccount->bsTax : '';
    ?>
        <p style="text-align: center;margin-top:40px;margin-bottom:20px;font-size:20px"><strong>HỢP ĐỒNG HỢP TÁC DỊCH VỤ
                VẬN CHUYỂN</strong></p>
        <p class="text-center"><strong><em>Số: <?= date("dm"); ?>/<?= date('Y')?>/HĐHT/FINTECH/IMEDIA
                    &ndash;</em></strong>
            <strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]</em></strong>
        </p>
        <ul>
            <li><em>Căn cứ Bộ luật D&acirc;n sự 2015 v&agrave; c&aacute;c văn bản hướng dẫn thi h&agrave;nh;</em></li>
            <li><em>Căn cứ Luật Thương mại 2005 v&agrave; c&aacute;c văn bản hướng dẫn thi h&agrave;nh;</em></li>
            <li><em>Căn cứ Luật Viễn th&ocirc;ng 2009 v&agrave; c&aacute;c văn bản hưỡng dẫn thi h&agrave;nh;</em></li>
            <li><em>Căn cứ khả năng, nhu cầu hợp t&aacute;c v&agrave; ph&aacute;t triển dịch vụ thanh to&aacute;n của
                    hai
                    B&ecirc;n.</em></li>
        </ul>
        <p><em>Hôm nay, ngày <?= date('d')?> tháng <?= date('m') ?> năm <?= date('Y') ?>, tại H&agrave; Nội, chúng tôi
                gồm:</em></p>
        <p><strong>B&ecirc;n A</strong>: <strong>C&Ocirc;NG TY CỔ PHẦN C&Ocirc;NG NGHỆ V&Agrave; DỊCH VỤ IMEDIA</strong>
        </p>
        <p>Đại diện&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : B&agrave; <strong>NGUYỄN
                THU
                TH&Ugrave;Y</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chức vụ: <strong>Ph&oacute; Gi&aacute;m
                Đốc</strong>
        </p>
        <p>Theo Giấy Ủy Quyền số: 05-2020/UQ-IMD, ng&agrave;y 01 th&aacute;ng 03 năm 2020 của Gi&aacute;m Đốc.</p>
        <p>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Tầng 18,
            T&ograve;a
            nh&agrave; Peakview, Số 36 Ho&agrave;ng Cầu, P &Ocirc; Chợ Dừa, Q Đống Đa, H&agrave; Nội</p>
        <p>Điện thoại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            0246.295.8884&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Fax:</p>
        <p>T&agrave;i khoản&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 035 0101 5133
            709&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Ng&acirc;n H&agrave;ng: Maritime Bank&ndash; Sở Giao
            Dịch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p>M&atilde; số DN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 0105837941</p>
        <p>Sau đ&acirc;y gọi tắt l&agrave; B&ecirc;n A hoặc <strong>IMD</strong></p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p><strong>Bên B</strong>: <strong>[<?= $acronym; ?>] &ndash; [<?= $companyName; ?>]</strong></p>
        <p>Đại diện&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            Ông<strong>/</strong>Bà
            <?= ($representative) ? '<strong>'.$representative.' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.............'; ?>
            -
            Chức
            vụ:
            <?= ($position) ? '<strong>'.$position.' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?>
        </p>
        <p>Địa chỉ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <?= ($address) ? $address : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?>

        </p>
        <p>Ng&agrave;y/th&aacute;ng/năm sinh:
            <?= ($dob) ? $dob : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?>
        </p>
        <p>CMT/CCCD số&nbsp;&nbsp; :
            <?= ($cid) ? $cid : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?>
            - Cấp
            ngày: <?= ($cidDate) ? $cidDate : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&ndash;' ?>
            CA: <?= ($cidPlace) ? $cidPlace : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...' ?>
        </p>
        <p>Điện thoại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <?= ($phone) ? $phone : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?>

        </p>
        <p>Mã số thuế&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <?= ($tax) ? $tax : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?>

        </p>
        <p>Tài khoản Ngân hàng số:
            <?= ($listBanks->bankAccount) ? $listBanks->bankAccount : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..' ;?>

        </p>
        <p>Mở tại ngân hàng:
            <?= ($listBanks->bankShortName) ? $listBanks->bankShortName : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..' ;?>
            Chi nhánh:
            &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..
        </p>
        <p>Sau đ&acirc;y gọi tắt l&agrave; B&ecirc;n B hoặc <strong>KH</strong></p>
        <p>Sau khi thỏa thuận, hai B&ecirc;n c&ugrave;ng nhau thống nhất k&yacute; kết Hợp đồng hợp t&aacute;c dịch vụ
            vận
            chuyển với những điều khoản v&agrave; điều kiện như sau:</p>
        <p><strong><u>ĐIỀU 1: C&Aacute;C ĐỊNH NGHĨA:</u></strong></p>
        <p class="mb-0">Trừ khi ngữ cảnh của Hợp đồng n&agrave;y quy định kh&aacute;c, c&aacute;c từ v&agrave; thuật ngữ
            sau
            đ&acirc;y
            tại
            Hợp đồng n&agrave;y sẽ c&oacute; nghĩa như sau:</p>
        <ul>
            <li>&ldquo;<strong>Hợp đồng</strong>&rdquo; c&oacute; nghĩa l&agrave; Hợp đồng hợp t&aacute;c Dịch vụ vận
                chuyển
                n&agrave;y, c&aacute;c Phụ lục đ&iacute;nh k&egrave;m Hợp đồng c&ugrave;ng với tất cả c&aacute;c
                t&agrave;i
                liệu
                li&ecirc;n quan v&agrave; đi k&egrave;m kh&aacute;c, c&oacute; thể được sửa đổi tại từng thời điểm
                v&agrave;
                được c&aacute;c b&ecirc;n k&yacute; kết bằng văn bản.</li>
            <li>&ldquo;<strong>B&ecirc;n</strong>&rdquo; c&oacute; nghĩa l&agrave; IMD hoặc KH v&agrave; những người kế
                thừa
                v&agrave;/hoặc những người được chuyển nhượng hợp ph&aacute;p của họ v&agrave; &ldquo;<strong>C&aacute;c
                    B&ecirc;n</strong>&rdquo; c&oacute; nghĩa l&agrave; mỗi v&agrave; tất cả c&aacute;c B&ecirc;n.</li>
            <li>&ldquo;<strong>Dịch vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; dịch vụ li&ecirc;n quan việc giao nhận
                Bưu
                gửi,
                bao gồm: chấp nhận, vận chuyển v&agrave; ph&aacute;t Bưu gửi bằng c&aacute;c phương thức từ địa điểm của
                KH
                đến
                địa điểm của người nhận.</li>
            <li>&ldquo;<strong>Người gửi</strong>&rdquo; c&oacute; nghĩa l&agrave; tổ chức, c&aacute; nh&acirc;n
                c&oacute;
                đề
                xuất gửi Bưu gửi v&agrave; được ch&iacute;nh KH chỉ định.</li>
            <li>&ldquo;<strong>Người nhận</strong>&rdquo; c&oacute; nghĩa l&agrave; tổ chức, c&aacute; nh&acirc;n
                c&oacute;
                t&ecirc;n tại phần ghi th&ocirc;ng tin về người nhận tr&ecirc;n Bưu gửi/Phiếu gửi/Đơn h&agrave;ng hoặc
                c&aacute;
                nh&acirc;n được Người nhận ủy quyền nhận Bưu gửi.</li>
            <li>&ldquo;<strong>Bưu gửi</strong>&rdquo; c&oacute; nghĩa l&agrave; thư, g&oacute;i, kiện h&agrave;ng
                h&oacute;a
                được chấp nhận, vận chuyển</li>
            <li>&ldquo;<strong>Cước ph&iacute; Dịch vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; chi ph&iacute; dịch vụ
                được
                t&iacute;nh tr&ecirc;n từng Đơn h&agrave;ng m&agrave; IMD đ&atilde; thực hiện cung cấp Dịch vụ cho KH
                dựa
                tr&ecirc;n Bảng Cước ph&iacute; Dịch vụ của IMD cung cấp.</li>
            <li>&ldquo;<strong>Phạm vi Cung ứng Dịch vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; khu vực m&agrave; IMD
                thực
                hiện chấp nhận, vận chuyển v&agrave; ph&aacute;t Bưu gửi từ nơi KH chỉ định đến địa chỉ Người nhận.</li>
            <li>&ldquo;<strong>Phiếu gửi</strong>&rdquo; c&oacute; nghĩa l&agrave; mẫu phiếu c&oacute; thể hiện Logo của
                IMD,
                m&atilde; số Bưu gửi, loại Bưu gửi, thời gian gửi, thời gian nhận Bưu gửi, th&ocirc;ng tin về t&ecirc;n,
                địa
                chỉ, điện thoại của Người gửi, Người nhận.</li>
            <li>&ldquo;<strong>Hệ thống</strong>&rdquo; c&oacute; nghĩa l&agrave; phần mềm hoặc website m&agrave; IMD
                cấp
                cho KH
                về việc quản l&yacute; Đơn h&agrave;ng v&agrave; quy tr&igrave;nh giao h&agrave;ng của IMD như tạo Đơn
                h&agrave;ng, theo d&otilde;i tiến tr&igrave;nh thực hiện Dịch vụ, đối so&aacute;t số liệu, th&ocirc;ng
                tin
                Bưu
                gửi v&agrave; c&aacute;c c&ocirc;ng nợ tồn đọng...</li>
            <li>&ldquo;<strong>Đơn h&agrave;ng</strong>&rdquo; c&oacute; nghĩa l&agrave; đơn y&ecirc;u cầu thực hiện
                Dịch vụ
                được KH thiết lập qua Hệ thống hoặc được viết tay dưới dạng Phiếu gửi c&oacute; đầy đủ th&ocirc;ng tin
                về
                Bưu
                gửi.</li>
            <li>&ldquo;<strong>Th&ocirc;ng tin Người nhận</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin
                li&ecirc;n
                quan
                đến t&ecirc;n, điện thoại, địa chỉ Người nhận.</li>
            <li>&ldquo;<strong>Thời gian To&agrave;n tr&igrave;nh</strong>&rdquo; của Bưu gửi l&agrave; khoảng thời gian
                được
                t&iacute;nh từ khi Bưu gửi được chấp nhận (IMD đến nhận Bưu gửi) cho đến khi Bưu gửi được ph&aacute;t
                cho
                Người
                nhận.</li>
            <li>&ldquo;<strong>Phụ ph&iacute; Gia tăng</strong>&rdquo; l&agrave; ph&iacute; c&aacute;c dịch vụ m&agrave;
                IMD
                thực hiện th&ecirc;m theo y&ecirc;u cầu của KH (nếu c&oacute;).</li>
            <li>&ldquo;<strong>COD</strong>&rdquo; l&agrave; việc IMD thực hiện cung ứng Dịch vụ v&agrave; thay KH thu
                tiền
                từ
                Người nhận theo ủy quyền của KH.</li>
            <li>&ldquo;<strong>Đối so&aacute;t Dịch vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; việc C&aacute;c
                B&ecirc;n
                thực
                hiện việc đối chiếu c&aacute;c Đơn h&agrave;ng IMD đ&atilde; thực hiện th&agrave;nh c&ocirc;ng hoặc
                kh&ocirc;ng
                th&agrave;nh c&ocirc;ng, chi ph&iacute; thực hiện Dịch vụ (bao gồm dịch vụ giao nhận Bưu gửi v&agrave;
                c&aacute;c Phụ ph&iacute; Gia tăng (nếu c&oacute;)).</li>
            <li>&ldquo;<strong>Th&ocirc;ng tin Bảo mật</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin li&ecirc;n
                quan
                đến
                việc thực hiện Hợp Đồng n&agrave;y, ngoại trừ c&aacute;c th&ocirc;ng tin về t&ecirc;n, địa chỉ,
                c&aacute;c
                hoạt
                động kinh doanh được ph&eacute;p của mỗi B&ecirc;n v&agrave; c&aacute;c nội dung kh&aacute;c đ&atilde;
                được
                c&ocirc;ng bố tr&ecirc;n c&aacute;c trang website ch&iacute;nh thức hoặc c&oacute; thể được c&ocirc;ng
                ch&uacute;ng tiếp cận v&igrave; bất kỳ l&yacute; do n&agrave;o ngoại trừ việc vi phạm Hợp đồng
                n&agrave;y.
            </li>
            <li>&ldquo;<strong>Sự kiện Bất khả kh&aacute;ng</strong>&rdquo; l&agrave; bất kỳ sự cản trở, chậm trễ hoặc
                ngừng
                hoạt động n&agrave;o xảy ra do b&atilde;i c&ocirc;ng, đ&oacute;ng cửa, tranh chấp lao động, thi&ecirc;n
                tai,
                chiến tranh, bạo động trong d&acirc;n ch&uacute;ng, hỏa hoạn hay c&aacute;c sự cố/tai họa kh&aacute;c;
                những
                thay đổi trong ch&iacute;nh s&aacute;ch của Ch&iacute;nh phủ m&agrave; vượt qu&aacute; khả năng kiểm
                so&aacute;t
                hợp l&yacute; của một B&ecirc;n khiến cho B&ecirc;n đ&oacute; kh&ocirc;ng thể thực hiện c&aacute;c nghĩa
                vụ
                được
                quy định tại Hợp đồng n&agrave;y.</li>
            <li>&ldquo;<strong>Cơ quan c&oacute; thẩm quyền</strong>&rdquo; c&oacute; nghĩa l&agrave; một hoặc/v&agrave;
                c&aacute;c cơ quan trực thuộc hệ thống Nh&agrave; nước Việt Nam, bất kỳ bộ, sở, ban, ng&agrave;nh hoặc
                cơ
                quan
                c&oacute; thẩm quyền n&agrave;o trực tiếp hoặc gi&aacute;n tiếp thuộc quyền quản l&yacute; của
                Nh&agrave;
                nước
                Việt Nam.</li>
            <li>&ldquo;<strong>Luật Bưu ch&iacute;nh</strong>&rdquo; c&oacute; nghĩa l&agrave; l&agrave; Luật Bưu
                ch&iacute;nh
                do Quốc hội ban h&agrave;nh đang được &aacute;p dụng tại thời điệm hiện tại v&agrave; tất cả c&aacute;c
                văn
                bản
                quy phạm ph&aacute;p luật, nghị định, quyết định, th&ocirc;ng tư, c&ocirc;ng văn, quy chế, chỉ thị,
                lệnh,
                hiệp
                định, quy định hoặc th&ocirc;ng b&aacute;o n&agrave;o (như được sửa đổi tại từng thời điểm) hoặc bất kỳ
                diễn
                giải c&oacute; li&ecirc;n quan điều chỉnh c&aacute;c quy định của Luật Bưu ch&iacute;nh..</li>
            <li>&ldquo;<strong>Luật Việt Nam</strong>&rdquo; c&oacute; nghĩa l&agrave; bất kỳ văn bản quy phạm
                ph&aacute;p
                luật,
                ph&aacute;p lệnh, nghị định, quyết định, th&ocirc;ng tư, c&ocirc;ng văn, quy chế, đạo luật, chỉ thị,
                lệnh,
                hiệp
                định, quy định hoặc th&ocirc;ng b&aacute;o n&agrave;o (như được sửa đổi tại từng thời điểm) hoặc bất kỳ
                diễn
                giải n&agrave;o đối với c&aacute;c văn bản đ&oacute; do bất kỳ Cơ quan Nh&agrave; nước n&agrave;o
                c&ocirc;ng
                bố,
                ban h&agrave;nh hoặc th&ocirc;ng qua.</li>
            <li>&ldquo;<strong>Việt Nam</strong>&rdquo; l&agrave; nước Cộng h&ograve;a X&atilde; hội Chủ nghĩa Việt Nam.
            </li>
        </ul>
        <p><strong><u>ĐI&Ecirc;̀U 2. NỘI DUNG DỊCH VỤ</u></strong></p>
        <ul>
            <li><strong>Dịch vụ giao nh&acirc;̣n Bưu gửi: </strong>Theo thỏa thu&acirc;̣n, KH đ&ocirc;̀ng ý chỉ
                định
                IMD
                và IMD đ&ocirc;̀ng ý cung ứng Dịch vụ chuyển ph&aacute;t Bưu gửi li&ecirc;n quan đến việc giao
                nh&acirc;̣n
                Bưu gửi gồm: chấp nhận, vận chuyển v&agrave; ph&aacute;t Bưu gửi bằng c&aacute;c phương thức từ địa
                điểm
                của KH
                đến địa điểm của Người nhận trong Phạm vi Cung ứng Dịch vụ hi&ecirc;̣n hành của IMD.</li>
            <li><strong>Phạm vi Cung ứng Dịch vụ: </strong>IMD thực hiện việc cung ứng Dịch vụ cho KH trong Phạm vi
                Cung
                ứng
                Dịch vụ được quy định bởi từng nh&agrave; vận chuyển.</li>
            <li><strong>Đi&ecirc;̀u chỉnh Phạm vi Cung ứng Dịch vụ: </strong>Trong trường hợp c&oacute; sự điều
                chỉnh
                về
                Phạm vi Cung ứng Dịch vụ, IMD có trách nhi&ecirc;̣m th&ocirc;ng báo bằng văn bản cho KH biết
                &iacute;t
                nhất
                15 (mười lăm) ngày trước ng&agrave;y thay đổi. Sau thời đi&ecirc;̉m n&agrave;y, Các b&ecirc;n sẽ
                ti&ecirc;́p
                tục thực hi&ecirc;̣n Hợp đ&ocirc;̀ng này theo Phạm vi Cung ứng Dịch vụ mới.</li>
            <li><strong>Dịch vụ Gia tăng: </strong>Trong trường hợp KH c&oacute; y&ecirc;u cầu,<strong> </strong>IMD
                sẽ
                cung
                ứng th&ecirc;m một số Dịch vụ Gia tăng theo Phụ lục 02 đính kèm Hợp đ&ocirc;̀ng này.</li>
            <li><strong>Ti&ecirc;́n trình và thời gian giao nh&acirc;̣n: </strong>Các b&ecirc;n thỏa thu&acirc;̣n
                tiến
                tr&igrave;nh theo thực t&ecirc;́ từng v&agrave;o từng thời đi&ecirc;̉m v&agrave; từng giai đoạn.
            </li>
        </ul>
        <p><strong><u>ĐI&Ecirc;̀U 3. CƯỚC PH&Iacute; DỊCH VỤ </u></strong></p>
        <ul>
            <li><strong>Cước ph&iacute; Dịch vụ:</strong> được thực hi&ecirc;̣n theo Bảng Cước ph&iacute; Dịch vụ
                hi&ecirc;̣n
                hành của IMD, được thể hiện tại Phụ lục 02<strong> </strong>đ&iacute;nh k&egrave;m Hợp đồng. Cước
                ph&iacute;
                Dịch vụ n&agrave;y c&oacute; thể thay đổi t&ugrave;y thuộc v&agrave;o từng thời điểm kh&aacute;c nhau.
            </li>
            <li><strong>Đi&ecirc;̀u chỉnh Cước ph&iacute; Dịch vụ: </strong>Trong trường hợp c&oacute; sự điều chỉnh
                về
                Cước
                ph&iacute; Dịch vụ, IMD phải th&ocirc;ng b&aacute;o bằng văn bản cho KH ít nh&acirc;́t 03 (ba) ngày
                trước
                ngày đi&ecirc;̀u chỉnh.<strong> </strong>Sau thời đi&ecirc;̉m đi&ecirc;̀u chỉnh, Các B&ecirc;n sẽ
                ti&ecirc;́p tục thực hi&ecirc;̣n Hợp đ&ocirc;̀ng này theo Bảng Cước ph&iacute; Dịch vụ mới do IMD
                th&ocirc;ng b&aacute;o.</li>
            <li><strong>Đ&ocirc;́i tượng chịu Cước ph&iacute; Dịch vụ:</strong> KH là đ&ocirc;́i tượng chịu Cước
                ph&iacute; Dịch vụ. Trường hợp KH chỉ định đ&ocirc;́i tượng chịu Cước ph&iacute; Dịch vụ là
                Người
                nh&acirc;̣n thì IMD mặc định được thu Cước ph&iacute; Dịch vụ của KH n&ecirc;́u Người nh&acirc;̣n
                từ
                ch&ocirc;́i thanh toán.</li>
        </ul>

        <p><strong><u>ĐI&Ecirc;̀U 4: QUY ĐỊNH THANH TO&Aacute;N</u></strong></p>
        <ul class="mb-0">
            <li><strong>Thanh to&aacute;n COD</strong>: Đối với Dịch vụ giao h&agrave;ng thu hộ tiền, IMD cho
                ph&eacute;p
                kh&aacute;ch h&agrave;ng chủ động lựa chọn v&agrave; thay đổi linh hoạt một trong c&aacute;c h&igrave;nh
                thức
                đối so&aacute;t như sau:</li>
        </ul>
        <ul class="pl-5">
            <li>Tự đối so&aacute;t<em>:</em> KH tự điền số tiền cần r&uacute;t về t&agrave;i khoản ng&acirc;n
                h&agrave;ng
                v&agrave;o bất kỳ khoảng thời gian n&agrave;o trong ng&agrave;y.</li>
            <li>Đối so&aacute;t định kỳ tự động v&agrave;o thứ 2, thứ 4, thứ 6 h&agrave;ng tuần.</li>
            <li>Đối so&aacute;t định kỳ tự động v&agrave;o thứ 2 v&agrave; thứ 5 h&agrave;ng tuần.</li>
            <li>Đối so&aacute;t định kỳ v&agrave;o thứ 4 h&agrave;ng tuần.</li>
        </ul>
        <p class="pl-4 mb-1">C&ocirc;ng thức t&iacute;nh:</p>
        <p class="pl-5"><em>Số tiền thực nhận = Số tiền IMD thu hộ - Tổng Cước ph&iacute; Dịch vụ</em></p>
        <ul class="mb-0">
            <li><strong>Quy trình, Thời hạn Đ&ocirc;́i soát, Thời hạn thanh to&aacute;n v&agrave; chiết khấu Cước
                    ph&iacute;
                    Dịch vụ</strong></li>
        </ul>
        <p>Trong 05 (năm) ng&agrave;y l&agrave;m việc đầu ti&ecirc;n của th&aacute;ng N+1, IMD sẽ thực hiện đối
            so&aacute;t
            Cước
            ph&iacute; Dịch vụ v&agrave; chiết khấu (nếu c&oacute;) trong th&aacute;ng N v&agrave; gửi cho KH
            th&ocirc;ng
            qua
            mail hoặc h&igrave;nh thức kh&aacute;c do hai B&ecirc;n đ&atilde; thống nhất. Trong v&ograve;ng 02 (hai)
            ng&agrave;y
            l&agrave;m việc tiếp theo kể từ ng&agrave;y nhận được đối so&aacute;t, KH c&oacute; tr&aacute;ch nhiệm phản
            hồi
            qua
            mail cho IMD. Sau khi nhận được phản hồi hoặc hết thời hạn m&agrave; KH kh&ocirc;ng phản hồi, IMD chốt
            v&agrave;
            xuất h&oacute;a đơn v&agrave;o ng&agrave;y 08 (t&aacute;m) th&aacute;ng N+1. Gi&aacute; trị tr&ecirc;n
            h&oacute;a
            đơn sẽ l&agrave; Cước ph&iacute; Dịch vụ trong th&aacute;ng sau khi trừ chiết khấu (nếu c&oacute;).</p>
        <p class="mb-0"><strong>Phương thức thanh toán: </strong>IMD sẽ thực hiện:</p>
        <ul>
            <li>Cộng phần tiền chiết khấu cho B&ecirc;n B được hưởng v&agrave;o t&agrave;i khoản của B&ecirc;n B
                tr&ecirc;n
                hệ
                thống HolaShip do IMD x&acirc;y dựng v&agrave; quản l&yacute;;</li>
            <li>hoặc Chuyển khoản v&agrave;o t&agrave;i khoản ng&acirc;n h&agrave;ng của B&ecirc;n B.
                <ul>
                    <li><strong>Xử lý các v&acirc;́n đ&ecirc;̀ phát sinh: </strong>Vi&ecirc;̣c đ&ocirc;́i soát,
                        thanh
                        toán
                        của kỳ trước li&ecirc;̀n k&ecirc;̀ được C&aacute;c B&ecirc;n cam k&ecirc;́t hoàn thành
                        trong
                        kỳ
                        phát sinh. Trường hợp KH kh&ocirc;ng đồng &yacute; với số liệu đối so&aacute;t từ IMD
                        th&igrave;
                        phải
                        gửi phản hồi cho IMD k&egrave;m theo căn cứ x&aacute;c đ&aacute;ng để C&aacute;c B&ecirc;n
                        c&ugrave;ng
                        xem x&eacute;t. Nếu trong thời hạn 05 (năm) ng&agrave;y m&agrave; C&aacute;c B&ecirc;n
                        kh&ocirc;ng
                        th&ecirc;̉ hoàn thành việc đối so&aacute;t Dịch vụ thì tạm thời &aacute;p dụng số liệu trong
                        đối
                        so&aacute;t do IMD đ&atilde; gửi để l&agrave;m căn cứ thanh to&aacute;n v&agrave; C&aacute;c
                        B&ecirc;n
                        sẽ thống nhất bằng văn bản về c&aacute;ch thức giải quyết đối với số ch&ecirc;nh lệch.</li>
                </ul>
            </li>
        </ul>

        <p><strong><u>ĐIỀU 5. GIAO NH&Acirc;̣N BƯU GỬI</u></strong></p>
        <ul>
            <li><strong>Th&ocirc;ng tin Bưu gửi: </strong>bao gồm c&aacute;c th&ocirc;ng tin<strong> </strong>v&ecirc;̀
                s&ocirc;́ lượng, kh&ocirc;́i lượng, k&iacute;ch thước ba (03) chiều (d&agrave;i - rộng - cao) của Bưu
                gửi,
                th&ocirc;ng tin Người gửi, Người nh&acirc;̣n và th&ocirc;ng tin khác được th&ecirc;̉ hi&ecirc;̣n
                tr&ecirc;n Phi&ecirc;́u gửi hoặc Đơn h&agrave;ng đ&atilde; được KH thiết lập tr&ecirc;n Hệ thống
                đ&atilde;
                được
                kết nối giữa C&aacute;c B&ecirc;n. KH phải điền v&agrave; cung cấp đầy đủ th&ocirc;ng tin tr&ecirc;n
                Phi&ecirc;́u gửi/Đơn h&agrave;ng trước khi chuyển cho IMD. IMD c&oacute; quyền từ chối nhận đối với
                những
                Bưu
                gửi kh&ocirc;ng đầy đủ th&ocirc;ng tin về Người nhận, Người gửi, hoặc c&aacute;c th&ocirc;ng tin
                li&ecirc;n
                quan
                đến Bưu gửi (nếu c&oacute;). T&ugrave;y thuộc v&agrave;o từng nh&agrave; vận chuyển hợp t&aacute;c
                c&ugrave;ng
                với IMD, y&ecirc;u cầu cho mỗi Bưu gửi c&oacute; thể sẽ kh&aacute;c nhau (IMD sẽ th&ocirc;ng b&aacute;o
                trước
                với KH).</li>
            <li><strong>Ch&acirc;́p nh&acirc;̣n Bưu gửi: </strong>IMD chỉ<strong> </strong>chấp nhận Bưu gửi khi
                c&oacute;
                đủ
                c&aacute;c điều kiện sau đ&acirc;y:</li>
        </ul>
        <ul>
            <li>V&acirc;̣t chứa trong Bưu gửi kh&ocirc;ng thu&ocirc;̣c danh mục hàng c&acirc;́m, hạn chế kinh doanh
                hoặc
                kinh doanh c&oacute; điều kiện theo quy định ph&aacute;p luật. Tuy nhi&ecirc;n, ngay cả khi IMD
                đ&atilde;
                chấp
                nhận Bưu gửi, tr&aacute;ch nhiệm chứng minh Bưu gửi l&agrave; hợp ph&aacute;p (nếu c&oacute;) vẫn sẽ
                thuộc
                về
                KH.</li>
            <li>C&oacute; đầy đủ th&ocirc;ng tin li&ecirc;n quan đến Người gửi, Người nhận tr&ecirc;n Bưu gửi, trừ
                trường
                hợp
                đặc bi&ecirc;̣t c&oacute; thỏa thuận kh&aacute;c;</li>
            <li>Đ&atilde; được KH ch&acirc;́p nh&acirc;̣n thanh toán Cước phí Dịch vụ;
                <ul>
                    <li><strong>Giao Bưu gửi đ&ecirc;́n Người nh&acirc;̣n:</strong> Nh&acirc;n vi&ecirc;n của IMD hoặc
                        nh&acirc;n vi&ecirc;n của nh&agrave; vận chuyển được IMD chỉ định (&ldquo;Nh&acirc;n vi&ecirc;n
                        giao
                        nhận h&agrave;ng&rdquo; có trách nhi&ecirc;̣m hướng dẫn Người nhận kiểm tra t&igrave;nh trạng
                        b&ecirc;n ngo&agrave;i của Bưu gửi v&agrave; gi&aacute;m s&aacute;t đến khi Người nhận
                        đ&ocirc;̀ng
                        ý
                        ký nh&acirc;̣n Bưu gửi (nếu c&oacute;). Trường hợp Người nh&acirc;̣n là doanh
                        nghi&ecirc;̣p,
                        cơ
                        quan, t&ocirc;̉ chức thì t&ugrave;y quy định của nh&agrave; vận chuyển, Nh&acirc;n vi&ecirc;n
                        giao
                        nhận h&agrave;ng c&oacute; thể chỉ thực hi&ecirc;̣n gửi đ&ecirc;́n b&ocirc;̣ ph&acirc;̣n văn
                        thư,
                        hành chính, thường trực, bảo v&ecirc;̣ hoặc người được ủy quy&ecirc;̀n.</li>
                </ul>
            </li>
        </ul>
        <p><strong><u>ĐIỀU 6. QUYỀN V&Agrave; NGHĨA VỤ CỦA IMD</u></strong></p>
        <ul class="mb-0">
            <li><strong> </strong><strong>Quy&ecirc;̀n </strong></li>
        </ul>
        <ol>
            <li><em> </em>Được quyền chủ động trong việc hợp t&aacute;c, chỉ định nh&agrave; vận chuyển kh&aacute;c thực
                hiện
                to&agrave;n bộ hoặc một phần Dịch vụ cho KH. Trong trường hợp n&agrave;y, KH đồng &yacute; tu&acirc;n
                thủ
                c&aacute;c quy định ri&ecirc;ng của nh&agrave; vận chuyển được IMD chỉ định (nếu c&oacute;) bao gồm
                nhưng
                kh&ocirc;ng giới hạn bởi: Cước ph&iacute; Dịch vụ; quy c&aacute;ch đ&oacute;ng g&oacute;i Bưu gửi,
                ph&iacute;
                khai gi&aacute;&hellip;miễn l&agrave; c&aacute;c quy định n&agrave;y được ghi r&otilde; trong Hợp đồng
                hoặc
                Phụ
                lục Hợp đồng hoặc c&oacute; sự thỏa thuận kh&aacute;c giữa C&aacute;c B&ecirc;n. Ngo&agrave;i c&aacute;c
                nội
                dung đ&oacute;, c&aacute;c quyền v&agrave; nghĩa vụ đ&atilde; thỏa thuận giữa IMD v&agrave; KH c&oacute;
                hiệu
                lực như ch&iacute;nh IMD thực hiện.</li>
            <li><em> </em>Y&ecirc;u cầu KH cho kiểm tra Bưu gửi trong mọi trường hợp, bao gồm nhưng kh&ocirc;ng giới
                hạn
                việc
                c&oacute; d&acirc;́u hi&ecirc;̣u cho th&acirc;́y Bưu gửi kh&ocirc;ng đúng, đủ ti&ecirc;u
                chu&acirc;̉n,
                nghi
                ngờ hàng c&acirc;́m, hàng giả, h&agrave;ng kh&ocirc;ng hợp ph&aacute;p hoặc theo y&ecirc;u
                c&acirc;̀u
                của
                Cơ quan quản lý thị trường, cơ quan nhà nước có th&acirc;̉m quy&ecirc;̀n. Tuy nhi&ecirc;n,
                C&aacute;c
                B&ecirc;n thống nhất rằng đ&acirc;y kh&ocirc;ng phải l&agrave; nghĩa vụ của IMD v&agrave; trong mọi
                trường
                hợp
                KH phải c&oacute; tr&aacute;ch nhiệm tu&acirc;n thủ đầy đủ c&aacute;c quy định của ph&aacute;p luật về
                Bưu
                gửi.
            </li>
            <li><em> </em>Đình chỉ ngay l&acirc;̣p tức việc nh&acirc;̣n, v&acirc;̣n chuy&ecirc;̉n, phát Bưu gửi và
                th&ocirc;ng báo cho Cơ quan có th&acirc;̉m quy&ecirc;̀n trong trường hợp phát hi&ecirc;̣n Bưu gửi
                chưa
                được ph&eacute;p lưu th&ocirc;ng tr&ecirc;n thị trường Việt Nam, Bưu gửi vi phạm quy định về
                h&agrave;ng
                cấm,
                h&agrave;ng hạn chế vận chuyển/kinh doanh hoặc h&agrave;ng kinh doanh c&oacute; điều kiện nhưng
                kh&ocirc;ng
                cung
                cấp được giấy ph&eacute;p v&agrave;/hoặc c&aacute;c điều kiện hợp ph&aacute;p.</li>
            <li><em> </em>Chấm dứt Hợp đồng ngay lập tức hoặc từ ch&ocirc;́i cung ứng Dịch vụ trong trường hợp:
                (i) KH
                vi
                phạm pháp lu&acirc;̣t Bưu chính; (ii) Bưu gửi thuộc danh mục h&agrave;ng h&oacute;a bị cấm, hạn chế
                kinh
                doanh hoặc kh&ocirc;ng thuộc phạm vi vận chuyển theo ch&iacute;nh s&aacute;ch của IMD được thể hiện tại
                website:
                <a href="https://holaship.vn">https://HolaShip.vn</a><u> </u>(iii) địa chỉ giao/nhận Bưu gửi nằm
                ngo&agrave;i
                Phạm vi Cung ứng Dịch vụ; (iv) th&ocirc;ng tin Bưu gửi v&agrave;/hoặc Th&ocirc;ng tin Người nhận/Người
                gửi
                kh&ocirc;ng r&otilde; r&agrave;ng; (v) qu&aacute; thời hạn thanh to&aacute;n Cước ph&iacute; Dịch vụ của
                đợt
                thanh to&aacute;n trước đ&oacute; cho IMD; (vi) Bưu gửi kh&ocirc;ng được đ&oacute;ng g&oacute;i cẩn
                thận,
                đ&uacute;ng quy c&aacute;ch, t&iacute;nh chất của nội dung của Bưu gửi; (vii) xảy ra trường hợp Người
                nhận
                khiếu
                nại về chất lượng Bưu gửi hoặc Bưu gửi c&oacute; dấu hiệu lừa đảo.
            </li>
            <li><em> </em>Sử dụng th&ocirc;ng tin giao dịch giữa IMD và KH nhằm quảng bá cho thương hi&ecirc;̣u,
                uy
                tín
                của IMD, trừ trường hợp KH từ ch&ocirc;́i bằng văn bản.</li>
            <li><em> </em>Trong trường hợp KH vi phạm thời gian thanh to&aacute;n, IMD c&oacute; quyền (i) cầm giữ
                v&agrave;
                định đoạt một lượng Bưu gửi nhất định v&agrave; c&aacute;c chứng từ li&ecirc;n quan đến Bưu gửi;
                v&agrave;/hoặc
                (ii) cấn trừ trực tiếp v&agrave;o Tiền thu hộ m&agrave; IMD đ&atilde; hỗ trợ thực hiện. Trường hợp Bưu
                gửi
                hoặc
                Tiền thu hộ kh&ocirc;ng đủ để cấn trừ Cước ph&iacute; Dịch vụ th&igrave; KH phải thanh to&aacute;n
                th&ecirc;m
                Cước ph&iacute; Dịch vụ c&ograve;n thiếu trong v&ograve;ng 03 (ba) ng&agrave;y từ ng&agrave;y IMD
                th&ocirc;ng
                b&aacute;o.</li>
            <li><em> </em>Được KH b&ocirc;̀i thường/bồi ho&agrave;nđ&acirc;̀y đủ trong trường hợp c&oacute;
                thi&ecirc;̣t
                hại xảy ra do KH vi phạm Hợp đ&ocirc;̀ng, vi phạm pháp lu&acirc;̣t v&ecirc;̀ Bưu chính, vi phạm
                ph&aacute;p luật kh&aacute;c.</li>
            <li><em> </em>IMD sẽ được miễn trừ tr&aacute;ch nhiệm bồi thường trong trường hợp Bưu gửi bị thất
                tho&aacute;t
                bởi
                Người nhận m&agrave; KH hoặc Người gửi đ&atilde; chỉ định, bao gồm nhưng kh&ocirc;ng giới hạn việc Bưu
                gửi
                bị
                cướp, giật, đ&aacute;nh tr&aacute;o, lừa đảo&hellip;. Để x&aacute;c định sự việc n&agrave;y do Người
                nhận
                thực
                hiện, IMD sẽ hỗ trợ tiến h&agrave;nh tr&igrave;nh b&aacute;o cơ quan c&oacute; thẩm quyền để giải quyết.

            </li>
        </ol>

        <ul class="mb-0">
            <li><strong> </strong><strong>Nghĩa vụ</strong></li>
        </ul>
        <ol>
            <li><em> </em>Thực hi&ecirc;̣n nghi&ecirc;m túc cam k&ecirc;́t v&ecirc;̀ thời hạn, quy trình, Thời
                gian
                Toàn
                trình cung ứng Dịch vụ như đ&atilde; thỏa thuận.</li>
            <li><em> </em>Cung cấp đúng, đầy đủ th&ocirc;ng tin về Dịch vụ cung ứng, Cước phí Dịch vụ đã cung
                ứng
                cho KH
                và tr&aacute;ch nhiệm bồi thường thiệt hại, c&aacute;c th&ocirc;ng tin li&ecirc;n quan kh&aacute;c (nếu
                c&oacute;).</li>
            <li><em> </em>Hướng dẫn KH sử dụng v&agrave; thực hiện đ&uacute;ng c&aacute;c quy định, quy tr&igrave;nh
                cung
                ứng
                Dịch vụ.</li>
            <li><em> </em>Đảm bảo chất lượng Dịch vụ theo đ&uacute;ng ti&ecirc;u chuẩn đ&atilde; c&ocirc;ng b&ocirc;́
                v&agrave;
                thoả thuận giữa C&aacute;c B&ecirc;n. C&ocirc;ng bố r&otilde;, kịp thời với đại di&ecirc;̣n KH
                c&aacute;c
                phương &aacute;n, biện ph&aacute;p xử l&yacute; trong trường hợp hoàn thành cung ứng Dịch vụ
                kh&ocirc;ng
                đúng như cam k&ecirc;́t.</li>
            <li><em> </em>Bồi thường thiệt hại cho KH (nếu c&oacute;) trong trường hợp c&oacute; vi phạm theo cam kết
                quy
                định
                tại Hợp đồng, c&aacute;c Phụ lục k&egrave;m theo Hợp đồng n&agrave;y v&agrave; theo quy định của
                ph&aacute;p
                luật.</li>
            <li><em> </em>Đảm bảo an to&agrave;n, ch&iacute;nh x&aacute;c v&agrave; b&iacute; mật th&ocirc;ng tin của KH
                theo
                qui định của ph&aacute;p luật, giữ b&iacute; mật th&ocirc;ng tin ri&ecirc;ng về Người nh&acirc;̣n,
                Người
                gửi,
                trừ trường hợp c&aacute;c th&ocirc;ng tin n&agrave;y xuất ph&aacute;t từ b&ecirc;n thứ ba hoặc được
                c&ocirc;ng
                bố rộng r&atilde;i tr&ecirc;n website của KH hoặc bất kỳ trang web/h&igrave;nh thức c&ocirc;ng khai
                n&agrave;o
                kh&aacute;c.</li>
            <li><em> </em>Đảm bảo an to&agrave;n cho Bưu gửi, kh&ocirc;ng b&oacute;c mở, tr&aacute;o đổi nội dung
                th&ocirc;ng
                tin h&agrave;ng h&oacute;a v&agrave; chứng từ đ&iacute;nh k&egrave;m trừ trường hợp ph&aacute;p luật
                c&oacute;
                quy định, IMD cần kiểm tra hoặc C&aacute;c b&ecirc;n c&oacute; thỏa thuận kh&aacute;c.</li>
            <li><em> </em>Hoàn trả Bưu gửi cho KH khi KH y&ecirc;u c&acirc;̀u, Người nhận từ chối nhận Bưu gửi hoặc
                kh&ocirc;ng giao được cho Người nhận mặc dù đã áp dụng mọi phương thức li&ecirc;n lạc có
                th&ecirc;̉.
                Trong trường hợp n&agrave;y, KH vẫn phải thanh to&aacute;n Cước ph&iacute; Dịch vụ cho c&aacute;c Đơn
                h&agrave;ng bị trả về n&agrave;y v&agrave; Cước ph&iacute; Trả h&agrave;ng theo quy định tại Phụ lục 2
                đ&iacute;nh k&egrave;m Hợp đồng n&agrave;y.</li>
            <li><em> </em>Tiếp nhận, giải quy&ecirc;́t hoặc h&ocirc;̃ trợ giải quy&ecirc;́t mọi khiếu nại của KH
                li&ecirc;n
                quan đến việc cung cấp Dịch vụ của IMD bao gồm nhưng kh&ocirc;ng giới hạn ch&acirc;́t lượng Dịch vụ,
                khiếu
                nại về Đơn h&agrave;ng&hellip;</li>
            <li><em> </em>Thu hộ tiền Bưu gửi cho KH v&agrave; ho&agrave;n trả Tiền thu hộ theo đ&uacute;ng quy
                tr&igrave;nh
                thỏa thuận giữa C&aacute;c b&ecirc;n (nếu c&oacute;).</li>
        </ol>
        <p><strong><u>ĐI&Ecirc;̀U 7. QUYỀN V&Agrave; NGHĨA VỤ KH&Aacute;CH H&Agrave;NG</u></strong></p>
        <ul class="mb-0">
            <li><strong> </strong><strong>Quyền</strong></li>
        </ul>
        <ol>
            <li><em> </em>Được IMD cung cấp đầy đủ th&ocirc;ng tin li&ecirc;n quan đến toàn b&ocirc;̣ quy trình cung
                ứng
                Dịch vụ.</li>
            <li><em> </em>Được IMD đảm bảo b&iacute; mật th&ocirc;ng tin, an to&agrave;n đối với Bưu gửi trong toàn
                qu&aacute; tr&igrave;nh giao h&agrave;ng theo quy định của ph&aacute;p luật.</li>
            <li><em> </em>Được IMD giải quyết khiếu nại, được giải quy&ecirc;́t thỏa đáng về Dịch vụ cung ứng
                đ&atilde; sử
                dụng.</li>
            <li><em> </em>Được IMD bồi thường thiệt hại tùy theo thực t&ecirc;́ từng trường hợp.

            </li>
        </ol>

        <ul class="mb-0">
            <li><strong> </strong><strong>Nghĩa vụ</strong></li>
        </ul>
        <ol>
            <li><em> </em>B&ocirc;́ trí, sắp x&ecirc;́p nh&acirc;n vi&ecirc;n thực hi&ecirc;̣n vi&ecirc;̣c đ&ocirc;́i
                soát
                Cước phí Dịch vụ đảm bảo đúng thời hạn.</li>
            <li><em> </em>Tuy&ecirc;̣t đ&ocirc;́i kh&ocirc;ng gửi Bưu gửi chưa được lưu th&ocirc;ng tr&ecirc;n thị
                trường,
                h&agrave;ng cấm, h&agrave;ng hạn chế vận chuyển/kinh doanh hoặc h&agrave;ng kinh doanh c&oacute; điều
                kiện
                nhưng
                kh&ocirc;ng cung cấp được giấy ph&eacute;p hoặc/v&agrave; kh&ocirc;ng đ&aacute;p ứng điều kiện
                kh&aacute;c
                theo
                quy định của ph&aacute;p luật.</li>
            <li><em> </em>Phối hợp với IMD thực hiện việc kiểm tra nội dung của Bưu gửi.</li>
            <li><em> </em>Chịu tr&aacute;ch nhiệm trước IMD v&agrave; trước ph&aacute;p luật về n&ocirc;̣i dung Bưu
                gửi,
                h&oacute;a đơn, chứng từ ngu&ocirc;̀n g&ocirc;́c xu&acirc;́t xứ của Bưu gửi v&agrave; chứng từ
                đ&iacute;nh
                k&egrave;m.</li>
            <li><em> </em>Chịu tr&aacute;ch nhiệm l&agrave;m việc, giải quyết với Cơ quan c&oacute; thẩm quyền khi Bưu
                gửi
                bị
                tạm giữ hoặc tịch thu.</li>
            <li><em> </em>Cung cấp đầy đủ h&oacute;a đơn, chứng từ của Bưu gửi cho IMD khi gửi Bưu gửi.</li>
            <li><em> </em>IMD sẽ được miễn trừ tr&aacute;ch nhiệm bồi thường trong trường hợp Bưu gửi bị tạm giữ hoặc
                tịch thu
                bởi cơ quan
                c&oacute; thẩm quyền do Bưu gửi kh&ocirc;ng c&oacute; h&oacute;a đơn, chứng từ hợp ph&aacute;p
                đ&iacute;nh
                k&egrave;m.</li>
            <li><em> </em>Thanh to&aacute;n đầy đủ, đúng hạn Cước ph&iacute; Dịch vụ, lãi trả ch&acirc;̣m
                (n&ecirc;́u
                có)
                theo quy định tại Điều 4 Hợp đồng n&agrave;y.</li>
            <li><em> </em>Đ&oacute;ng g&oacute;i Bưu gửi theo đ&uacute;ng quy c&aacute;ch, k&iacute;ch thước v&agrave;
                t&iacute;nh chất của từng mặt h&agrave;ng, đặc biệt đối với Bưu gửi l&agrave; c&aacute;c mặt h&agrave;ng
                dễ
                vỡ,
                dễ hư hỏng</li>
            <li><em> </em>Cung c&acirc;́p đ&acirc;̀y đủ chỉ dẫn li&ecirc;n quan đến Bưu gửi; th&ocirc;ng tin li&ecirc;n
                quan
                đến Người gửi, Người nhận tr&ecirc;n Bưu gửi.</li>
            <li><em> </em>Bồi thường thiệt hại thực tế cho IMD v&agrave; b&ecirc;n thứ ba c&oacute; li&ecirc;n quan khi
                thiệt
                hại xảy ra có ngu&ocirc;̀n g&ocirc;́c từ KH/Người gửi theo quy định của ph&aacute;p luật.</li>
            <li><em> </em>Chịu tr&aacute;ch nhiệm về mọi th&ocirc;ng tin li&ecirc;n quan đến Người nhận m&agrave; KH
                giao
                cho
                IMD. Trường hợp xảy ra sai s&oacute;t về th&ocirc;ng tin Người nhận hoặc Bưu gửi kh&ocirc;ng đ&uacute;ng
                y&ecirc;u cầu của Người nhận th&igrave; KH c&oacute; tr&aacute;ch nhiệm tự giải quyết với Người nhận,
                đồng
                thời
                KH vẫn phải thanh to&aacute;n Cước ph&iacute; Dịch vụ đối với Đơn h&agrave;ng tr&ecirc;n dựa tr&ecirc;n
                lộ
                tr&igrave;nh đ&atilde; thực hiện.</li>
            <li><em> </em>Bằng chi ph&iacute; của m&igrave;nh, chịu tr&aacute;ch nhiệm giải quyết c&aacute;c vấn đề
                li&ecirc;n
                quan đến (i) tranh chấp về quyền sở hữu Bưu gửi, nguồn gốc Bưu gửi với b&ecirc;n thứ ba bất kỳ; hoặc
                (ii)
                khiếu
                nại của Người nhận về việc h&agrave;ng h&oacute;a bị lỗi, hư hỏng hoặc kh&ocirc;ng đ&uacute;ng y&ecirc;u
                cầu.
            </li>
            <li><em> </em>Trường hợp ngừng sử dụng Dịch vụ của IMD, KH phải th&ocirc;ngb&aacute;o bằng văn bản trước 15
                (mười
                lăm) ng&agrave;y để IDM thực hiện đối so&aacute;t v&agrave; thanh to&aacute;n đ&uacute;ng hạn.</li>
            <li><em> </em>Kh&ocirc;ng được chuyển nhượng hoặc chuyển giao Hợp đồng hoặc bất kỳ quyền v&agrave; nghĩa vụ
                của
                m&igrave;nh theo Hợp đồng n&agrave;y cho b&ecirc;n thứ ba m&agrave; kh&ocirc;ng được sự đồng &yacute;
                bằng
                văn
                bản của IMD.</li>
        </ol>

        <p><strong><u>ĐI&Ecirc;̀U 8. CHẤM DỨT HỢP ĐỒNG</u></strong></p>
        <p class="mb-0">Hợp đ&ocirc;̀ng này được ch&acirc;́m dứt trong các trường hợp sau đ&acirc;y:</p>
        <ul>
            <li>Hợp đ&ocirc;̀ng h&ecirc;́t hạn.</li>
            <li>Hợp đồng c&oacute; thể chấm dứt trước thời hạn theo thoả thuận của C&aacute;c B&ecirc;n tham gia Hợp
                đồng
                v&agrave; đảm bảo c&aacute;c nguy&ecirc;n tắc:</li>
            <ul>
                <li>C&aacute;c B&ecirc;n phải c&oacute; th&ocirc;ng bảo, thoả thuận với nhau trước tối thiểu 10 (mười)
                    ng&agrave;y.
                </li>
                <li>C&aacute;c B&ecirc;n thực hiện ho&agrave;n th&agrave;nh thanh to&aacute;n c&aacute;c khoản Cước
                    ph&iacute;
                    Dịch
                    vụ, chi ph&iacute; ph&aacute;t sinh trước khi chấm dứt Hợp đồng.

                </li>
            </ul>

            <li>C&aacute;c B&ecirc;n vi phạm bất kỳ điều khoản n&agrave;o của Hợp đồng m&agrave; kh&ocirc;ng thể
                thoả
                thuận thống nhất được. Trong trường hợp n&agrave;y, B&ecirc;n bị vi phạm c&oacute; quyền đơn phương
                chấm
                dứt Hợp đồng nếu sau thời hạn 15 (mười lăm) ng&agrave;y m&agrave; B&ecirc;n vi phạm kh&ocirc;ng thể
                khắc
                ph&uacute;c được h&agrave;nh vi vi phạm. Đồng thời B&ecirc;n vi phạm phải bồi thường to&agrave;n bộ
                thiệt hại xảy ra cho B&ecirc;n bị vi phạm.
                Ri&ecirc;ng trường hợp KH vi phạm ph&aacute;p luật về việc gửi h&agrave;ng cấm th&igrave; IMD được quyền
                chấm
                dứt
                Hợp
                đồng ngay lập tức m&agrave; kh&ocirc;ng cần phải thực hiện sau thời gian y&ecirc;u cầu KH khắc phục vi
                phạm.
            </li>

            <li>Các trường hợp khác theo quy định của Luật Việt Nam.</li>
        </ul>

        <p><strong><u>ĐI&Ecirc;̀U 9. BẢO MẬT TH&Ocirc;NG TIN</u></strong></p>
        <ul>
            <li>Mỗi B&ecirc;n phải tiến h&agrave;nh c&aacute;c biện ph&aacute;p v&agrave; h&agrave;nh động cần thiết
                nhằm
                bảo
                mật Th&ocirc;ng tin Bảo mật.</li>
            <li>C&aacute;c B&ecirc;n trong Hợp đồng n&agrave;y v&agrave; nh&acirc;n vi&ecirc;n của m&igrave;nh
                kh&ocirc;ng
                được
                quyền sử dụng, c&ocirc;ng bố Th&ocirc;ng tin Bảo mật cho bất kỳ mục đ&iacute;ch n&agrave;o kh&aacute;c
                ngoại
                trừ
                để thực hiện Hợp đồng n&agrave;y.</li>
            <li>Mỗi B&ecirc;n bảo đảm rằng bất kỳ b&ecirc;n thứ ba n&agrave;o nhận được Th&ocirc;ng tin Bảo mật sẽ
                kh&ocirc;ng
                được ph&eacute;p tiết lộ Th&ocirc;ng tin Bảo mật cho bất kỳ người n&agrave;o v&agrave; chỉ được
                ph&eacute;p
                xử
                l&yacute; Th&ocirc;ng tin Bảo mật theo quy định v&agrave; nhằm mục đ&iacute;ch thực hiện Hợp đồng
                n&agrave;y,
                trừ khi việc tiết lộ th&ocirc;ng tin được thực hiện theo y&ecirc;u cầu của ph&aacute;p luật hoặc Cơ quan
                c&oacute; thẩm quyền.</li>
            <li>Trong trường hợp B&ecirc;n n&agrave;o được y&ecirc;u cầu tiết lộ Th&ocirc;ng tin Bảo mật cho c&aacute;c
                Cơ
                quan
                c&oacute; thẩm quyền theo quy định của ph&aacute;p luật, B&ecirc;n được y&ecirc;u cầu phải gửi văn bản
                th&ocirc;ng b&aacute;o trước cho B&ecirc;n c&ograve;n lại về y&ecirc;u cầu đ&oacute;, trừ khi được
                y&ecirc;u
                cầu
                kh&aacute;c của Cơ quan c&oacute; thẩm quyền.</li>
            <li>Việc hết hạn hoặc chấm dứt Hợp đồng n&agrave;y sẽ kh&ocirc;ng chấm dứt nghĩa vụ bảo mật Th&ocirc;ng tin
                Bảo
                mật
                của C&aacute;c B&ecirc;n.</li>
        </ul>
        <p><strong><u>ĐI&Ecirc;̀U 10. GIẢI QUYẾT TRANH CHẤP</u></strong></p>
        <ul>
            <li>Mọi tranh chấp, tranh c&atilde;i hay những bất đồng giữa C&aacute;c B&ecirc;n, ph&aacute;t sinh từ
                v&agrave;/hoặc li&ecirc;n quan đến Hợp đồng n&agrave;y, hay từ việc vi phạm Hợp đồng, sẽ được giải quyết
                trước
                hết th&ocirc;ng qua thương lượng tr&ecirc;n tinh th&acirc;̀n thiện ch&iacute; giữa C&aacute;c
                B&ecirc;n.
                Nếu
                tranh chấp kh&ocirc;ng thể giải quyết được bằng thương lượng, thiện ch&iacute; th&igrave; sẽ được giải
                quyết
                bởi
                T&ograve;a &aacute;n c&oacute; thẩm quyền.</li>
            <li>B&ecirc;n thua kiện phải chịu to&agrave;n bộ c&aacute;c chi ph&iacute; c&oacute; li&ecirc;n quan bao gồm
                nhưng
                kh&ocirc;ng giới hạn &aacute;n ph&iacute;, lệ ph&iacute; gi&aacute;m định, chi ph&iacute; luật
                sư&hellip;
            </li>
        </ul>

        <p><strong><u>ĐI&Ecirc;̀U 11. BẤT KHẢ KH&Aacute;NG</u></strong></p>
        <ul>
            <li>B&ecirc;n bị ảnh hưởng bởi Sự kiện Bất khả kh&aacute;ng phải, ngay khi biết được, th&ocirc;ng b&aacute;o
                to&agrave;n bộ sự việc bằng văn bản cho B&ecirc;n kia v&agrave; phải cố gắng hết sức v&agrave; &aacute;p
                dụng
                c&aacute;c biện ph&aacute;p khắc phục thiệt hại, mất m&aacute;t do Sự kiện Bất khả kh&aacute;ng
                g&acirc;y
                ra.
                B&ecirc;n kia sẽ hỗ trợ v&agrave; hợp t&aacute;c với B&ecirc;n bị ảnh hưởng.</li>
            <li>Trong trường hợp Sự kiện Bất khả kh&aacute;ng xảy ra trong một khoảng thời gian li&ecirc;n tục
                qu&aacute;
                s&aacute;u mươi (60) ng&agrave;y, B&ecirc;n bị ảnh hưởng c&oacute; quyền chấm dứt Hợp đồng ngay sau khi
                gửi
                văn
                bản th&ocirc;ng b&aacute;o cho B&ecirc;n kia. Trong trường hợp n&agrave;y, kh&ocirc;ng B&ecirc;n
                n&agrave;o
                phải
                chịu bất kỳ tr&aacute;ch nhiệm bồi thường hay phạt vi phạm n&agrave;o đối với B&ecirc;n kia.</li>
        </ul>

        <p><strong><u>ĐI&Ecirc;̀U 12. CHỐNG HỐI LỘ</u></strong></p>
        <ul>
            <li>KH cam kết rằng KH cũng như nh&acirc;n vi&ecirc;n, Người gửi của m&igrave;nh kh&ocirc;ng tặng qu&agrave;
                cho
                IMD
                cũng như nh&acirc;n vi&ecirc;n IMD, đồng thời kh&ocirc;ng được y&ecirc;u cầu nh&acirc;n vi&ecirc;n IMD
                tặng
                qu&agrave;. Qu&agrave; trong điều khoản n&agrave;y được hiểu l&agrave; c&aacute;c m&oacute;n qu&agrave;
                biếu
                bao
                gồm nhưng kh&ocirc;ng giới hạn c&aacute;c m&oacute;n qu&agrave; c&oacute; gi&aacute; trị hoặc
                kh&ocirc;ng
                c&oacute; gi&aacute; trị, tiền, lời hứa hoặc bất kỳ khoản hoa hồng n&agrave;o.</li>
            <li>Trường hợp KH vi phạm, IMD c&oacute; quyền chấm dứt Hợp đồng n&agrave;y, đồng thời KH phải chịu phạt 8%
                Cước
                ph&iacute; Dịch vụ của th&aacute;ng vi phạm.</li>
        </ul>

        <p><strong><u>ĐI&Ecirc;̀U 13. CAM K&Ecirc;́T CHUNG GIỮA CÁC B&Ecirc;N </u></strong></p>
        <ul>
            <li>Các B&ecirc;n cam k&ecirc;́t tuy&ecirc;̣t đ&ocirc;́i kh&ocirc;ng vi phạm quy định ph&aacute;p luật
                v&agrave;
                c&aacute;c điều khoản tại Hợp đồng n&agrave;y.</li>
            <li>Các B&ecirc;n thực hi&ecirc;̣n nghi&ecirc;m túc, đ&acirc;̀y đủ mọi đi&ecirc;̀u khoản ghi trong
                Hợp
                đ&ocirc;̀ng này.</li>
            <li>Mọi sửa đổi, bổ sung của Hợp đồng n&agrave;y phải được đồng &yacute; bằng văn bản của C&aacute;c
                B&ecirc;n.
            </li>
        </ul>
        <p>Hợp đồng v&agrave; c&aacute;c phụ lục của Hợp đồng (nếu c&oacute;) c&ugrave;ng với tất cả c&aacute;c
            t&agrave;i
            liệu
            li&ecirc;n quan v&agrave; đi k&egrave;m kh&aacute;c sẽ thiết lập n&ecirc;n to&agrave;n bộ Hợp đồng c&oacute;
            gi&aacute; trị r&agrave;ng buộc giữa C&aacute;c B&ecirc;n v&agrave; sẽ thay thế, hủy bỏ to&agrave;n bộ
            c&aacute;c
            thương lượng, t&agrave;i liệu, khẳng định, cam kết v&agrave; thỏa thuận trước khi lập Hợp đồng.</p>
        <p>Trong trường hợp c&oacute; bất kỳ m&acirc;u thuẫn n&agrave;o giữa Hợp đồng v&agrave; c&aacute;c phụ lục của
            Hợp
            đồng
            th&igrave; c&aacute;c điều khoản của Hợp đồng sẽ được ưu ti&ecirc;n &aacute;p dụng.</p>
        <ul>
            <li>Mỗi B&ecirc;n tự chịu c&aacute;c khoản chi ph&iacute; v&agrave; ph&iacute; tổn của B&ecirc;n m&igrave;nh
                trong
                việc thương lượng, dự thảo, ph&ecirc; chuẩn v&agrave; k&yacute; kết Hợp đồng v&agrave; c&aacute;c phụ
                lục
                của
                Hợp đồng (nếu c&oacute;) v&agrave; c&aacute;c t&agrave;i liệu c&oacute; li&ecirc;n quan n&ecirc;u trong
                Hợp
                đồng
                v&agrave; c&aacute;c phụ lục của Hợp đồng.</li>
            <li>Hợp đồng kh&ocirc;ng thiết lập quan hệ giữa C&aacute;c B&ecirc;n như l&agrave; đại l&yacute; hay đại
                diện
                của
                b&ecirc;n kia, nhằm tạo ra sự tin tưởng hay mối quan hệ đối t&aacute;c thương mại. Kh&ocirc;ng B&ecirc;n
                n&agrave;o c&oacute; quyền được h&agrave;nh động hay g&aacute;nh tr&aacute;ch nhiệm tr&ecirc;n danh
                nghĩa
                của
                B&ecirc;n kia trong Hợp đồng n&agrave;y.</li>
            <li>Tất cả th&ocirc;ng b&aacute;o v&agrave; phương tiện li&ecirc;n lạc được quy định hoặc y&ecirc;u cầu theo
                Hợp
                đồng n&agrave;y phải được lập th&agrave;nh văn bản v&agrave; sẽ được (i) gửi thư ri&ecirc;ng, (ii) gửi
                thư
                bằng
                c&aacute;ch x&aacute;c nhận hoặc gửi bảo đảm k&egrave;m theo giấy b&aacute;o đ&atilde; gửi thư theo
                y&ecirc;u
                cầu, hoặc gửi thư bằng đường h&agrave;ng kh&ocirc;ng, (iii) gửi qua thư điện tử e-mail, hoặc (iv) gửi
                fax
                đến
                C&aacute;c B&ecirc;n tương ứng. IMD c&oacute; thể dựa v&agrave;o th&ocirc;ng b&aacute;o của người được
                ủy
                quyền
                bởi KH, đồng thời sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm t&igrave;m hiểu, điều tra về thẩm quyền của
                người
                đ&oacute;. Trong mọi trường hợp việc Hợp đồng được k&yacute; bởi người đại diện c&oacute; thẩm quyền
                v&agrave;
                đ&oacute;ng dấu giữa C&aacute;c b&ecirc;n đều c&oacute; gi&aacute; trị ph&aacute;p l&yacute; thực hiện.
            </li>
            <li>Hợp đồng sẽ tự động thanh l&yacute; trong trường hợp được chấm dứt theo một trong c&aacute;c quy định
                tại
                Điều 8
                v&agrave; mỗi B&ecirc;n đ&atilde; thực hiện đầy đủ c&aacute;c nghĩa vụ theo Hợp đồng</li>
            <li>Hợp Đồng n&agrave;y c&oacute; hiệu lực 01 (một) năm kể từ ng&agrave;y k&yacute;. Hợp đồng n&agrave;y sẽ
                tự
                động
                gia hạn v&agrave; mỗi lần gia hạn sẽ l&agrave; 01 (một) năm nếu 30 (ba mươi) ng&agrave;y trước khi hết
                hạn
                Hợp
                đồng, mỗi B&ecirc;n kh&ocirc;ng th&ocirc;ng b&aacute;o cho ph&iacute;a B&ecirc;n kia về &yacute; định
                chấm
                dứt
                Hợp Đồng.</li>
            <li>Hợp đồng được lập th&agrave;nh 02 bản bằng Tiếng Việt, c&oacute; gi&aacute; trị ph&aacute;p l&yacute;
                như
                nhau,
                mỗi B&ecirc;n giữ 01 bản để thực hiện.</li>
        </ul>

        <table width="613" style="margin: 0 auto;">
            <tbody>
                <tr>
                    <td width="303">
                        <img src="<?php echo base_url('/public/images/pgdsign.png') ?>" alt="">
                    </td>
                    <td width="309" style="text-align: center;">
                        <p><strong>ĐẠI DIỆN BÊN B</strong></p>
                        <p><strong>
                                <?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>
                                <?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><strong>PHỤ LỤC 01</strong></p>
        <p><strong>THỜI HẠN, THỜI HIỆU V&Agrave; QUY TR&Igrave;NH GIẢI QUYẾT KHIẾU NẠI</strong></p>
        <p><em>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c Dịch vụ vận chuyển <strong>số
                    [<?= date('d')?><?= date('m') ?>]
                    /<?= date('Y')?>/HĐHT/FINTECH/IMEDIA
                    &ndash;</strong></em> <em><strong>[<?= $acronym; ?>/<?= $companyName; ?>] </strong></em> <em> giữa
                c&ocirc;ng ty C&ocirc;ng ty
                Cổ
                phần
                C&ocirc;ng nghệ v&agrave; Dịch vụ IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;)&nbsp; v&agrave;&nbsp;
                <em><strong>[<?= $acronym; ?>] &ndash; [<?= $companyName; ?>]</strong></em>
                (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave;
                &ldquo;<strong>Hợp đồng</strong>&rdquo;)</em></p>
        <p><strong><br /></strong><strong>ĐIỀU 1: QUY ĐỊNH CHUNG VỀ BỒI THƯỜNG</strong></p>
        <ul>
            <li>Số tiền bồi thường tối đa sẽ kh&ocirc;ng vượt qu&aacute; gi&aacute; trị khai gi&aacute; tối đa của
                Nh&agrave;
                vận chuyển.</li>
            <li>Trường hợp đơn h&agrave;ng xảy ra lỗi do ph&iacute;a KH (Người gửi) hoặc do đặc t&iacute;nh tự
                nhi&ecirc;n
                của
                đơn h&agrave;ng h&oacute;a, IMD sẽ kh&ocirc;ng chịu mọi tr&aacute;ch nhiệm.</li>
            <li>Tất cả c&aacute;c trường hợp đơn h&agrave;ng bị Cơ quan nh&agrave; nước c&oacute; thẩm quyền thu giữ,
                hoặc
                ti&ecirc;u hủy do kh&aacute;ch h&agrave;ng vi phạm quy định của ph&aacute;p luật IMD từ chối hỗ trợ
                v&agrave;
                kh&ocirc;ng chịu mọi tr&aacute;ch nhiệm.</li>
            <li>IMD từ chối tiếp nhận v&agrave; xử l&yacute; khiếu nại ph&aacute;t sinh trong trường hợp Người gửi
                kh&ocirc;ng
                thực hiện đầy đủ c&aacute;c quy định về gửi h&agrave;ng.</li>
            <li>Đối với đơn h&agrave;ng c&oacute; sử dụng khai gi&aacute; h&agrave;ng h&oacute;a: cần đảm bảo thực hiện
                c&aacute;c quy định sau đ&acirc;y:</li>
            <ul>
                <li>Khai b&aacute;o gi&aacute; trị h&agrave;ng h&oacute;a kh&ocirc;ng vượt qu&aacute; gi&aacute; trị
                    khai
                    gi&aacute;
                    tối đa của nh&agrave; vận chuyển.</li>
                <li>Đối với đơn h&agrave;ng c&oacute; sử dụng khai gi&aacute;, kh&aacute;ch h&agrave;ng phải thực hiện
                    đồng kiểm
                    với
                    nh&acirc;n vi&ecirc;n tới lấy h&agrave;ng hoặc nh&acirc;n vi&ecirc;n bưu cục.</li>
                <li>IMD sẽ c&oacute; quyền y&ecirc;u cầu kh&aacute;ch h&agrave;ng cung cấp h&oacute;a đơn, chứng từ hợp
                    lệ của
                    đơn
                    h&agrave;ng để xem x&eacute;t việc khai gi&aacute; h&agrave;ng h&oacute;a.</li>
            </ul>
            </li>

        </ul>

        <p><strong><em>Lưu &yacute;: </em></strong></p>
        <p class="mb-0"><em>H&oacute;a đơn, chứng từ hợp lệ được hiểu l&agrave; bao gồm nhưng kh&ocirc;ng giới hạn tại
                c&aacute;c trường
                hợp
                sau:</em></p>
        <ul>
            <li><em>H&oacute;a đơn gi&aacute; trị gia tăng, nếu người b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai
                    thuế
                    gi&aacute; trị gia tăng theo phương ph&aacute;p khấu trừ</em></li>
            <li><em>H&oacute;a đơn b&aacute;n h&agrave;ng, nếu người b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai
                    thuế
                    gi&aacute; trị gia tăng theo phương ph&aacute;p trực tiếp hoặc Hộ kinh doanh.</em></li>
            <li><em>Hồ sơ k&ecirc; khai hải quan, nếu h&agrave;ng h&oacute;a được nhập khẩu v&agrave;o Việt Nam</em>
            </li>
            <li><em>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</em></li>
        </ul>

        <p><strong>ĐIỀU 2: KHAI GI&Aacute; H&Agrave;NG H&Oacute;A</strong></p>
        <ul>
            <li>Ph&iacute; khai gi&aacute; h&agrave;ng h&oacute;a l&agrave; số tiền KH sử dụng cho c&aacute;c rủi ro từ
                b&ecirc;n ngo&agrave;i g&acirc;y mất m&aacute;t, tổn thất vật chất đối với h&agrave;ng h&oacute;a được
                khai
                gi&aacute;, xảy ra trong qu&aacute; tr&igrave;nh vận chuyển hoặc lưu kho tạm thời trong qu&aacute;
                tr&igrave;nh
                vận chuyển.</li>
            <li>Số tiền khai gi&aacute; cho mỗi đơn h&agrave;ng được quy định theo từng Nh&agrave; vận chuyển:</li>

            <ul>
                <li><em>HolaShip </em>(t&ecirc;n một ứng dụng thuộc IMD v&agrave; l&agrave; kh&aacute;i niệm đại diện
                    cho IMD
                    trong
                    Hợp đồng)<em>:</em></li>
                <ul>
                    <li>Dưới 3.000.000 VND miễn ph&iacute;</li>
                    <li>Từ 3.000.001 &ndash; 10.000.000 VND t&iacute;nh ph&iacute; 1 % gi&aacute; trị h&agrave;ng
                        h&oacute;a</li>
                    <li>Gi&aacute; trị khai gi&aacute; tối đa 10.000.000 VND</li>
                </ul>

                <li><em>GHN Express</em>:</li>
                <ul>
                    <li>Miễn ph&iacute; khai gi&aacute; với h&agrave;ng h&oacute;a c&oacute; gi&aacute; trị đến
                        3.000.000 VND</li>
                    <li>H&agrave;ng h&oacute;a c&oacute; gi&aacute; trị từ tr&ecirc;n 3.000.000 VND đến 10.000.000 VND:
                        0,5 % *
                        gi&aacute; trị h&agrave;ng h&oacute;a</li>

                    <li>Gi&aacute; trị khai gi&aacute; tối đa 10.000.000 VND</li>
                </ul>
                <li><em>J&amp;T: </em></li>
                <ul>
                    <li>Miễn ph&iacute; khai gi&aacute; với h&agrave;ng h&oacute;a c&oacute; gi&aacute; trị đến
                        1.000.000 VND</li>
                    <li>H&agrave;ng h&oacute;a c&oacute; gi&aacute; trị từ tr&ecirc;n 1.000.000 VND: 1,1% * gi&aacute;
                        trị
                        h&agrave;ng
                        h&oacute;a</li>
                    <li>Gi&aacute; trị khai gi&aacute; tối đa 30.000.000 VND</li>
                </ul>
            </ul>
            <p>&nbsp;</p>
            <p><strong>ĐIỀU 3: CH&Iacute;NH S&Aacute;CH BỒI THƯỜNG</strong></p>
            <ul>
                <li><strong> </strong><strong>Đối với nh&agrave; vận chuyển HolaShip</strong></li>
            </ul>
            <p>HolaShip c&oacute; tr&aacute;ch nhiệm bồi thường thiệt hại xảy ra trong qu&aacute; tr&igrave;nh cung ứng
                Dịch
                vụ
                chuyển ph&aacute;t dẫn đến lỗi mất m&aacute;t hoặc hư hỏng một phần hoặc hư hỏng to&agrave;n phần đối
                với
                h&agrave;ng h&oacute;a.</p>
            <p>Việc bồi thường thiệt hại li&ecirc;n quan đến thực trạng Bưu gửi được thực hiện như sau:</p>
            <ul>
                <li><strong><em> </em></strong><strong><em>Bưu gửi l&agrave; vật phẩm, h&agrave;ng h&oacute;a hoặc giấy
                            tờ
                            c&oacute;
                            gi&aacute; trị</em></strong> (bao gồm c&aacute;c loại giấy tờ sau: Phiếu qu&agrave; tặng,
                    phiếu giảm
                    gi&aacute;, phiếu học, phiếu mua h&agrave;ng hoặc giấy tờ c&oacute; gi&aacute; trị tương đương với
                    phiếu mua
                    h&agrave;ng): Bồi thường theo thiệt hại thực tế, căn cứ v&agrave;o: (i) Gi&aacute; trị thu hộ; hoặc
                    (ii) Cơ
                    sở
                    x&aacute;c minh gi&aacute; trị Bưu gửi (được hiểu l&agrave; trị gi&aacute; Bưu gửi ghi tr&ecirc;n
                    h&oacute;a
                    đơn
                    c&oacute; gi&aacute; trị ph&aacute;p l&yacute;, ghi r&otilde; nội dung h&agrave;ng h&oacute;a
                    tr&ecirc;n
                    h&oacute;a đơn; hoặc Gi&aacute; trị thấp nhất của Bưu gửi tham khảo thị trường của 03 (ba) website
                    b&aacute;n
                    h&agrave;ng tại Việt Nam). HolaShip sẽ thực hiện việc bồi thường như sau:
                    <ul>
                        <li><em> </em><em>Trường hợp Bưu gửi bị mất: &nbsp;</em></li>
                        <ul>
                            <li>Trường hợp c&oacute; thu hộ th&igrave; bồi thường 100 % gi&aacute; trị thu hộ.</li>
                            <li>Trường hợp kh&ocirc;ng c&oacute; thu hộ hoặc thu hộ thấp hơn gi&aacute; trị thực,
                                gi&aacute; trị dưới
                                1.000.000
                                VND th&igrave; đền b&ugrave; 100 % theo Cơ sở x&aacute;c minh gi&aacute; trị Bưu gửi
                                (nhưng tối đa
                                kh&ocirc;ng
                                qu&aacute; 1.000.000 VND (một triệu đồng)).</li>
                            <li>Trong trường hợp kh&ocirc;ng thu hộ hoặc thu hộ thấp hơn gi&aacute; trị thực, gi&aacute;
                                trị
                                tr&ecirc;n
                                1.000.000 VND, c&oacute; khai gi&aacute;, c&oacute; h&oacute;a đơn VAT: đền 100 % theo
                                gi&aacute; trị
                                tr&ecirc;n
                                h&oacute;a đơn VAT.</li>
                            <li>Trong trường hợp kh&ocirc;ng thu hộ hoặc thu hộ thấp hơn gi&aacute; trị thực, gi&aacute;
                                trị
                                tr&ecirc;n
                                1.000.000 VND, kh&ocirc;ng khai gi&aacute;: bồi thường bằng 04 (bốn) lần cước hoặc
                                gi&aacute; trị linh
                                hoạt.
                            </li>
                            <li>Trường hợp kh&ocirc;ng c&oacute; thu hộ v&agrave; kh&ocirc;ng c&oacute; Cơ sở x&aacute;c
                                minh
                                gi&aacute;
                                trị
                                bưu
                                gửi th&igrave; bồi thường 04 (bốn) lần cước ph&iacute; của Dịch vụ đ&atilde; sử dụng.
                                &nbsp;
                        </ul>
                        <li><em> </em><em>Trường hợp Bưu gửi bị hư hỏng: &nbsp;</em></li>
                        <ul>
                            <p>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi thường mất h&agrave;ng, tuy nhi&ecirc;n
                                gi&aacute; trị
                                bồi
                                thường
                                phụ thuộc v&agrave;o mức độ hư hỏng của Bưu gửi, cụ thể như sau:</p>
                            <p><strong><em>Gi&aacute; trị </em></strong>bồi thường<strong><em> = Mức </em></strong>bồi
                                thường
                                <strong><em>theo
                                        ch&iacute;nh s&aacute;ch mất h&agrave;ng </em></strong>x<strong><em> mức
                                    </em></strong>bồi thường
                                <strong><em>theo bảng b&ecirc;n dưới</em></strong>
                            </p>
                            <p><strong>Bảng gi&aacute; trị </strong>bồi thường <strong>đối với h&agrave;ng h&oacute;a hư
                                    hỏng:<em>
                                    </em></strong>
                            </p>
                            <table class="w-100" border=1>
                                <tbody>
                                    <tr class="text-center">
                                        <td width="259">
                                            <p><strong>Trạng th&aacute;i</strong></p>
                                        </td>
                                        <td width="98">
                                            <p><strong>Mức đền b&ugrave;</strong></p>
                                        </td>
                                        <td width="266">
                                            <p><strong>Gi&aacute; trị đền b&ugrave;</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="259" class="pl-2">
                                            <p>Mất phụ kiện, sản phẩm c&ograve;n nguy&ecirc;n</p>
                                        </td>
                                        <td width="98" class="pl-2">
                                            <p>20 %</p>
                                        </td>
                                        <td width="266" class="pl-2">
                                            <p>Mức bồi thường theo ch&iacute;nh s&aacute;ch mất h&agrave;ng x 20 %</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="259" class="pl-2">
                                            <p>H&agrave;ng h&oacute;a bị bể vỡ, hư hại từ 1 % đến 30 %</p>
                                        </td>
                                        <td width="98" class="pl-2">
                                            <p>30 %</p>
                                        </td>
                                        <td width="266" class="pl-2">
                                            <p>Mức bồi thường theo ch&iacute;nh s&aacute;ch mất h&agrave;ng x 30 %</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="259" class="pl-2">
                                            <p>H&agrave;ng h&oacute;a bị bể vỡ, hư hại từ 31 % đến 50 %</p>
                                        </td>
                                        <td width="98" class="pl-2">
                                            <p>50 %</p>
                                        </td>
                                        <td width="266" class="pl-2">
                                            <p>Mức bồi thường theo ch&iacute;nh s&aacute;ch mất h&agrave;ng x 50 %</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="259" class="pl-2">
                                            <p>H&agrave;ng h&oacute;a bị bể vỡ, hư hại vượt qu&aacute; 50 %</p>
                                        </td>
                                        <td width="98" class="pl-2">
                                            <p>100 %</p>
                                        </td>
                                        <td width="266" class="pl-2">
                                            <p>Mức bồi thường theo ch&iacute;nh s&aacute;ch mất h&agrave;ng x 100 %</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <p>Lưu &yacute; đối với ch&iacute;nh s&aacute;ch bồi thường đơn h&agrave;ng bị hư hỏng:</p>
                            <ul>
                                <li>HolaShip bồi thường đơn h&agrave;ng hư hỏng khi nguy&ecirc;n nh&acirc;n g&acirc;y
                                    thiệt hại đến từ
                                    HolaShip
                                </li>
                                <li>Mức độ hư hỏng của h&agrave;ng h&oacute;a v&agrave; gi&aacute; trị Bưu gửi tham khảo
                                    thị trường của
                                    03
                                    (ba)
                                    website b&aacute;n h&agrave;ng tại Việt Nam sẽ do HolaShip x&aacute;c minh v&agrave;
                                    th&ocirc;ng
                                    b&aacute;o
                                    cho
                                    KH.</li>
                                <li>Trường hợp h&agrave;ng h&oacute;a bị bể, vỡ 1 sản phẩm trong bộ sản phẩm đi liền
                                    th&igrave; mức bồi
                                    thường
                                    được:
                                </li>
                                <li>X&aacute;c định theo sản phẩm, t&iacute;nh chung cả bộ nếu HolaShip giữ h&agrave;ng.
                                </li>
                                <li>X&aacute;c định theo sản phẩm, t&iacute;nh bồi thường ri&ecirc;ng sản phẩm nếu KH
                                    giữ h&agrave;ng.
                                </li>
                                <li>Trường hợp h&agrave;ng h&oacute;a bị bể, vỡ 01 sản phẩm trong c&ugrave;ng 01 đơn
                                    h&agrave;ng nhưng
                                    kh&ocirc;ng
                                    đi liền theo bộ th&igrave; mức bồi thường được x&aacute;c định theo sản phẩm,
                                    t&iacute;nh bồi thường
                                    ri&ecirc;ng, kh&ocirc;ng bồi thường cả đơn h&agrave;ng.</li>
                                <li>Trường hợp HolaShip ph&aacute;t hiện Bưu gửi bị hư hỏng sau khi nhận, th&igrave;
                                    HolaShip sẽ bồi
                                    thường
                                    tương
                                    ứng với mức độ hư hỏng theo Bảng gi&aacute; trị bồi thường h&agrave;ng h&oacute;a hư
                                    hỏng như
                                    tr&ecirc;n.
                                </li>
                            </ul>
                        </ul>
                    </ul>
            </ul>
        </ul>
        <ul>
            <ul>
                <li><strong><em> </em></strong><strong><em>Lưu &yacute; chung về ch&iacute;nh s&aacute;ch bồi
                            thường</em></strong></li>
                <p>HolaShip sẽ chỉ bồi thường trực tiếp cho KH/Ngưởi gửi, trường hợp KH/Ngưởi gửi c&oacute; email chỉ
                    định việc
                    bồi
                    thường thực hiện cho Người nhận th&igrave; HolaShip sẽ bồi thường cho Người nhận theo email của
                    Kh&aacute;ch
                    h&agrave;ng/Ngưởi gửi. &nbsp;</p>

                <ul>
                    <li>Gi&aacute; trị bồi thường trong c&aacute;c trường hợp tr&ecirc;n đ&atilde; bao gồm ho&agrave;n
                        trả lại
                        Cước
                        ph&iacute; Dịch vụ m&agrave; KH đ&atilde; thanh to&aacute;n. Trong trường hợp ph&iacute; vận
                        chuyển chưa
                        được KH
                        thanh to&aacute;n, phần bồi thường sẽ kh&ocirc;ng bao gồm Cước ph&iacute; Dịch vụ của HolaShip
                    </li>
                    <li>Đối với Bưu gửi l&agrave; c&aacute;c Giấy tờ c&oacute; gi&aacute; trị th&igrave; thời gian sử
                        dụng Giấy tờ
                        c&oacute; gi&aacute; trị kể từ khi HolaShip nhận h&agrave;ng phải c&ograve;n thời hạn sử dụng
                        tối thiểu
                        l&agrave; 03 (ba) th&aacute;ng. Trường hợp Bưu gửi kh&ocirc;ng đạt điều kiện n&agrave;y
                        th&igrave; HolaShip
                        được
                        miễn tr&aacute;ch nhiệm bồi thường.</li>
                    <li>Trong mọi trường hợp kh&ocirc;ng x&aacute;c định được gi&aacute; trị Bưu gửi (Kh&ocirc;ng
                        c&oacute; Cơ sở
                        x&aacute;c minh gi&aacute; trị Bưu gửi v&agrave; kh&ocirc;ng y&ecirc;u cầu thu hộ): Bồi thường
                        bốn (04) lần
                        cước
                        ph&iacute; dịch vụ/đơn h&agrave;ng.

                    </li>
                </ul>
            </ul>
        </ul>
        </ul>
        <style>
        .table-data td {
            padding: 10px;
            line-height: 20px;
        }

        table p {
            margin-bottom: 0px;
        }
        </style>
        <ul>
            <li><strong> </strong><strong>Đối với nh&agrave; vận chuyển GHN Express</strong>
                <ul>
                    <li><strong><em> </em></strong><strong><em>Đơn h&agrave;ng bị mất, thất lạc </em></strong>
                        <ul>
                            <li><em> </em><em>&Aacute;p dụng cho đơn h&agrave;ng c&oacute; trọng lượng dưới 10 kg</em>
                            </li>
                            <table class="w-100" border=1>
                                <tbody>
                                    <tr class="text-center">
                                        <td rowspan="2" width="20">
                                            <p><strong>STT</strong></p>
                                        </td>
                                        <td colspan="2" width="167">
                                            <p><strong>T&igrave;nh trạng</strong></p>
                                        </td>
                                        <td colspan="3" width="410">
                                            <p><strong>Gi&aacute; trị h&agrave;ng h&oacute;a</strong></p>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td width="78">
                                            <p><strong>Khai gi&aacute;</strong></p>
                                        </td>
                                        <td width="90">
                                            <p><strong>H&oacute;a đơn VAT</strong></p>
                                        </td>
                                        <td width="146">
                                            <p><strong>Dưới&nbsp; 1 triệu VND</strong></p>
                                        </td>
                                        <td width="138">
                                            <p><strong>Từ 1 triệu VND đến dưới 3 triệu VND</strong></p>
                                        </td>
                                        <td width="126">
                                            <p><strong>Từ 3 triệu VND trở l&ecirc;n</strong></p>
                                        </td>
                                    </tr>
                                    <tr class="table-data">
                                        <td width="45">
                                            <p>1</p>
                                        </td>
                                        <td width="78">
                                            <p>C&oacute;</p>
                                        </td>
                                        <td width="90">
                                            <p>C&oacute;</p>
                                        </td>
                                        <td width="146">
                                            <p>- Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng&nbsp;</p>
                                            <p>- Tối đa kh&ocirc;ng qu&aacute; 1.000.000 (Một triệu đồng)</p>
                                        </td>
                                        <td width="138">
                                            <p>- Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng&nbsp;</p>
                                            <p>- Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu đồng)</p>
                                        </td>
                                        <td width="126">
                                            <p>- &nbsp;&nbsp;Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng</p>
                                            <p>- &nbsp;&nbsp;Tối đa kh&ocirc;ng qu&aacute; 5.000.000 (Năm triệu đồng)
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="table-data">
                                        <td width="45">
                                            <p>2</p>
                                        </td>
                                        <td width="78">
                                            <p>C&oacute;</p>
                                        </td>
                                        <td width="90">
                                            <p>Kh&ocirc;ng</p>
                                        </td>
                                        <td width="146">
                                            <p>- &nbsp;Bồi thường 75 % gi&aacute; trị đơn h&agrave;ng&nbsp;</p>
                                            <p>- &nbsp;Tối đa kh&ocirc;ng qu&aacute; 1.000.000 (Một triệu đồng)</p>
                                        </td>
                                        <td width="138">
                                            <p>- &nbsp;Bồi thường 75 % gi&aacute; trị đơn h&agrave;ng</p>
                                            <p>- &nbsp;Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu đồng)</p>
                                        </td>
                                        <td width="126">
                                            <p>-&nbsp; Bốn (04) lần Cước ph&iacute; Dịch vụ</p>
                                        </td>
                                    </tr>
                                    <tr class="table-data">
                                        <td width="45">
                                            <p>&nbsp;</p>
                                            <p>3</p>
                                        </td>
                                        <td width="78">
                                            <p>Kh&ocirc;ng</p>
                                        </td>
                                        <td width="90">
                                            <p>C&oacute;</p>
                                        </td>
                                        <td width="146">
                                            <p>- &nbsp;Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng</p>
                                            <p>- &nbsp;Tối đa kh&ocirc;ng qu&aacute; 1.000.000 (Một triệu đồng)</p>
                                        </td>
                                        <td width="138">
                                            <p>- &nbsp;Bốn (04) lần Cước ph&iacute; Dịch vụ</p>
                                        </td>
                                        <td width="126">
                                            <p>- &nbsp;Bốn (04) lần Cước ph&iacute; Dịch vụ</p>
                                        </td>
                                    </tr>
                                    <tr class="table-data">
                                        <td width="45">
                                            <p>4</p>
                                        </td>
                                        <td width="78">
                                            <p>Kh&ocirc;ng</p>
                                        </td>
                                        <td width="90">
                                            <p>Kh&ocirc;ng</p>
                                        </td>
                                        <td width="146">
                                            <p>- &nbsp;Bồi thường 75 % gi&aacute; trị đơn h&agrave;ng&nbsp;</p>
                                            <p>- &nbsp;Tối đa kh&ocirc;ng qu&aacute; 1.000.000 (Một triệu đồng)</p>
                                        </td>
                                        <td width="138">
                                            <p>- &nbsp;Bốn (04) lần Cước ph&iacute; Dịch vụ</p>
                                        </td>
                                        <td width="126">
                                            <p>- &nbsp;Bốn (04) lần Cước ph&iacute; Dịch vụ</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </ul>
                    </li>
                </ul>
            </li>
            <p>&nbsp;</p>
            <ul>
                <li><strong><em> </em></strong><strong><em>Trường hợp đơn h&agrave;ng bị hư hỏng (&aacute;p dụng cho tất
                            cả đơn
                            h&agrave;ng với tất cả trọng lượng kh&aacute;c nhau)</em></strong></li>
            </ul>
            <p class="pl-2 mb-0">Gi&aacute; trị bồi thường sẽ phụ thuộc v&agrave;o mức độ hư hỏng của Bưu gửi, cụ thể
                được
                x&aacute;c định như
                sau:
            </p>
            <p class="ml-3  mb-0"><strong><em>Gi&aacute; trị bồi thường hư hỏng = Mức bồi thường (theo bảng mất
                        h&agrave;ng) x
                        Tỷ lệ bồi
                        thường</em></strong></p>
            <p class="ml-5 "><strong><em>(xem bảng tỷ lệ bồi thường ph&iacute;a dưới)</em></strong></p>

            <ul>
                <ul>
                    <li><em> </em><em>Bảng tỷ lệ bồi thường hư hỏng</em></li>

                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td rowspan="2" width="342">
                                    <p><strong>Loại hư hỏng</strong></p>
                                </td>
                                <td width="264">
                                    <p><strong>Tỷ lệ bồi thường</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="264">
                                    <p><strong>Đơn h&agrave;ng c&oacute; trọng lượng dưới 10 kg</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>R&aacute;ch, ướt vỏ th&ugrave;ng h&agrave;ng</p>
                                </td>
                                <td width="264">
                                    <p>0 %</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>Bể vỡ g&oacute;i bọc, r&aacute;ch tem (đối với h&agrave;ng điện tử v&agrave;
                                        h&agrave;ng
                                        h&oacute;a
                                        c&ograve;n nguy&ecirc;n vẹn)</p>
                                </td>
                                <td width="264">
                                    <p>10 %</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>Mất, thiếu phụ kiện, h&agrave;ng h&oacute;a đơn lẻ (kh&ocirc;ng ảnh hưởng đến sản
                                        phẩm)</p>
                                </td>
                                <td width="264">
                                    <p>10 %</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>Bể vỡ hư hại kh&ocirc;ng ảnh hưởng tới c&ocirc;ng năng</p>
                                </td>
                                <td width="264">
                                    <p>30 %</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>Bể vỡ, hư hại ảnh hưởng tới c&ocirc;ng năng</p>
                                </td>
                                <td width="264">
                                    <p>100 %</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><strong>&nbsp;</strong></p>
                </ul>
            </ul>
        </ul>
        <ul>
            <li><strong> </strong><strong>Đối với nh&agrave; vận chuyển J&amp;T</strong>
                <ul>
                    <li><strong><em> </em></strong><strong><em>Trường hợp Bưu gửi bị mất, tr&aacute;o đổi to&agrave;n
                                phần</em></strong> </li>

                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td rowspan="2" width="48">
                                    <p><strong>STT</strong></p>
                                </td>
                                <td colspan="2" width="150">
                                    <p><strong>T&igrave;nh trạng</strong></p>
                                </td>
                                <td colspan="2" width="426">
                                    <p><strong>Gi&aacute; trị h&agrave;ng h&oacute;a</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="78">
                                    <p><strong>Khai gi&aacute;</strong></p>
                                </td>
                                <td width="72">
                                    <p><strong>H&oacute;a đơn</strong></p>
                                </td>
                                <td width="228">
                                    <p><strong>&le; 3 triệu đồng</strong></p>
                                </td>
                                <td width="198">
                                    <p><strong>Từ 3 triệu trở l&ecirc;n</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="48">
                                    <p>1</p>
                                </td>
                                <td width="78">
                                    <p>C&oacute;</p>
                                </td>
                                <td width="72">
                                    <p>C&oacute;</p>
                                </td>
                                <td width="228">
                                    <p>- &nbsp;Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng</p>
                                    <p><strong>- </strong>Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu đồng)</p>
                                </td>
                                <td width="198">
                                    <p>- &nbsp;Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng</p>
                                    <p><strong>-</strong> Tối đa kh&ocirc;ng qu&aacute; 30.000.000 (Ba mươi triệu đồng)
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="48">
                                    <p>2</p>
                                </td>
                                <td width="78">
                                    <p>C&oacute;</p>
                                </td>
                                <td width="72">
                                    <p>Kh&ocirc;ng</p>
                                </td>
                                <td width="228">
                                    <p>- &nbsp;Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng</p>
                                    <p><strong>-</strong> Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu đồng)</p>
                                </td>
                                <td width="198">
                                    <p><strong>- </strong>Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu đồng)</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="48">
                                    <p>3</p>
                                </td>
                                <td width="78">
                                    <p>Kh&ocirc;ng</p>
                                </td>
                                <td width="72">
                                    <p>C&oacute;</p>
                                </td>
                                <td colspan="2" rowspan="2" width="426">
                                    <p>Gi&aacute; trị bồi thường&nbsp; tối đa 04 (bốn) lần cước</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="48">
                                    <p>4</p>
                                </td>
                                <td width="78">
                                    <p>Kh&ocirc;ng</p>
                                </td>
                                <td width="72">
                                    <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </ul>
            </li>
            <p>&nbsp;</p>
            <ul>
                <li><strong><em> </em></strong><strong><em>Trường hợp Bưu gửi bị hư hỏng</em></strong></li>
            </ul>
            <ul>
                <li>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi thường mất h&agrave;ng (trường hợp c&oacute; khai
                    gi&aacute;),
                    tuy nhi&ecirc;n gi&aacute; trị bồi thường phụ thuộc v&agrave;o mức độ hư hỏng của Bưu gửi <em>(% hư
                        hỏng</em>
                    <em>sẽ được thỏa thuận dựa v&agrave;o th&ocirc;ng tin tr&ecirc;n Bi&ecirc;n bản đồng kiểm,
                        h&igrave;nh ảnh
                        đồng
                        kiểm giữa J&amp;T v&agrave; Người gửi)</em>
                </li>
                <li>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi thường mất h&agrave;ng (trường hợp kh&ocirc;ng khai
                    gi&aacute;), tuy nhi&ecirc;n gi&aacute; trị bồi thường phụ thuộc v&agrave;o mức độ hư hỏng của đơn
                    h&agrave;ng
                    để &aacute;p dụng ch&iacute;nh s&aacute;ch bồi thường. <em>(Xem bảng tỷ lệ bồi thường ph&iacute;a
                        dưới)</em>
                </li>

                <li><em> </em><em>Bảng tỷ lệ bồi thường hư hỏng</em></li>

                <table class="w-100 table-data" border=1>
                    <tbody>
                        <tr>
                            <td width="456">
                                <p><strong>Loại hư hỏng</strong></p>
                            </td>
                            <td width="162">
                                <p><strong>Tỷ lệ bồi thường</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="456">
                                <p>R&aacute;ch, ướt vỏ th&ugrave;ng h&agrave;ng</p>
                            </td>
                            <td width="162">
                                <p>5 %</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="456">
                                <p>Bể vỡ g&oacute;i bọc, r&aacute;ch tem (đối với h&agrave;ng điện tử v&agrave;
                                    h&agrave;ng
                                    h&oacute;a
                                    c&ograve;n nguy&ecirc;n vẹn)</p>
                            </td>
                            <td width="162">
                                <p>10 %</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="456">
                                <p>Mất, thiếu phụ kiện, h&agrave;ng h&oacute;a đơn lẻ (kh&ocirc;ng ảnh hưởng đến sản
                                    phẩm)</p>
                            </td>
                            <td width="162">
                                <p>20 %</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="456">
                                <p>Bể vỡ hư hại kh&ocirc;ng ảnh hưởng tới c&ocirc;ng năng</p>
                            </td>
                            <td width="162">
                                <p>50 % (đối với hư hỏng từ 31 % - 50 %)</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="456">
                                <p>Bể vỡ, hư hại ảnh hưởng tới c&ocirc;ng năng</p>
                            </td>
                            <td width="162">
                                <p>100 %</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </ul>
        </ul>

        <p><strong>&nbsp;</strong></p>
        <p><strong>ĐIỀU 4: THỜI HẠN V&Agrave; THỜI GIAN XỬ L&Yacute; KHIẾU NẠI</strong></p>
        <ul>
            <li><strong><em> </em></strong><strong><em>Thời hạn khiếu nại</em></strong></li>
            <ul>
                <li>Hai (02) th&aacute;ng, kể từ ng&agrave;y kết th&uacute;c Thời gian to&agrave;n tr&igrave;nh của Bưu
                    gửi đối
                    với
                    khiếu nại về việc mất Bưu gửi.</li>
                <li>Một (01) th&aacute;ng, kể từ ng&agrave;y Bưu gửi được ph&aacute;t cho Người nhận đối với khiếu nại
                    về việc
                    Bưu
                    gửi bị suy suyển, hư hỏng, về gi&aacute; cước, chuyển ph&aacute;t Bưu gửi chậm so với Thời gian
                    to&agrave;n
                    tr&igrave;nh đ&atilde; c&ocirc;ng bố v&agrave; c&aacute;c nội dung kh&aacute;c c&oacute; li&ecirc;n
                    quan
                    trực
                    tiếp đến Bưu gửi.
                </li>
            </ul>
        </ul>
        <ul>
            <li><strong><em> </em></strong><strong><em>Thời gian xử l&yacute; khiếu nại</em></strong></li>
            <ul>
                <li>Đơn h&agrave;ng sau khi được IMD nhận th&ocirc;ng tin sẽ được kiểm tra v&agrave; chuyển sang
                    Nh&agrave; vận
                    chuyển trong v&ograve;ng 30 ph&uacute;t.</li>
                <li>Thời gian kết th&uacute;c, đ&oacute;ng khiếu nại sẽ kh&ocirc;ng qu&aacute; 01 (một) ng&agrave;y sau
                    khi
                    nh&agrave; vận chuyển trả kết quả

                    <p>Đối với c&aacute;c đơn h&agrave;ng mất, hư hỏng h&agrave;ng, tiền bồi thường sẽ được chuyển
                        kh&ocirc;ng
                        chậm
                        hơn mười (10) ng&agrave;y l&agrave;m việc trừ khi bị khi chối bồi thường.</p>
                </li>
            </ul>
        </ul>
        <p><strong>ĐIỀU 5. HIỆU LỰC</strong></p>
        <ul>
            <li>Phụ lục n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y
                <?= date('d')?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave;
                phần
                kh&ocirc;ng thể t&aacute;ch rời của Hợp đồng.</li>
            <li>Phụ lục n&agrave;y được lập th&agrave;nh hai (02) bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như
                nhau,
                mỗi b&ecirc;n giữ một (01) bản.</li>
        </ul>
        <table width="613" style="margin: 0 auto;">
            <tbody>
                <tr>
                    <td width="303">
                        <img src="<?php echo base_url('/public/images/pgdsign.png') ?>" alt="">
                    </td>
                    <td width="309" style="text-align: center;">
                        <p><strong>ĐẠI DIỆN BÊN B</strong></p>
                        <p><strong>
                                <?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>
                                <?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p><strong>&nbsp;</strong></p>
        <p><strong>&nbsp;</strong></p>
        <p><strong>PHỤ LỤC 02</strong></p>
        <p><strong>BẢNG CƯỚC PH&Iacute; DỊCH VỤ V&Agrave; PHỤ PH&Iacute; GIA TĂNG</strong></p>
        <p><em>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c Dịch vụ vận chuyển <strong>số
                    [<?= date('d')?><?= date('m') ?>]
                    /<?= date('Y')?>/HĐHT/FINTECH/IMEDIA
                    &ndash;</strong></em> <em><strong>[<?= $acronym; ?>/<?= $companyName; ?>] </strong></em><em>giữa
                c&ocirc;ng ty C&ocirc;ng ty
                Cổ
                phần
                C&ocirc;ng nghệ v&agrave; Dịch vụ IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;)&nbsp; v&agrave;&nbsp;
                <em><strong>[<?= $acronym; ?>] &ndash; [<?= $companyName; ?>]</strong></em>
                (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave;
                &ldquo;<strong>Hợp đồng</strong>&rdquo;)</em></p>
        <p><strong>ĐIỀU 1. GI&Aacute; CƯỚC VẬN CHUYỂN</strong></p>
        <p>Bảng Cước ph&iacute; Dịch vụ v&agrave; phụ ph&iacute; gia tăng n&agrave;y c&oacute; hiệu lực trong
            v&ograve;ng 01
            (một)năm, nếu c&oacute; thay đổi IMD sẽ b&aacute;o trước cho kh&aacute;ch h&agrave;ng 03 (ba) ng&agrave;y
            bằng
            email
            hoặc văn bản hoặc th&ocirc;ng b&aacute;o tr&ecirc;n website <a
                href="https://holaship.vn">https://HolaShip.vn</a>&nbsp;&nbsp;&nbsp;</p>
        <ol>
            <li><strong> </strong><strong><u>NH&Agrave; VẬN CHUYỂN HOLASHIP</u></strong>
                <ol>
                    <li><strong> </strong><strong>Bảng gi&aacute; (&aacute;p dụng nội th&agrave;nh, ngoại th&agrave;nh
                            H&agrave;
                            Nội
                            v&agrave; Hồ Ch&iacute; Minh)</strong></li>
                    <p><em>Đơn vị: VNĐ</em></p>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="156">
                                    <p><strong>Tỉnh</strong></p>
                                </td>
                                <td width="126">
                                    <p><strong>C&acirc;n nặng</strong></p>
                                </td>
                                <td width="120">
                                    <p><strong>Nội th&agrave;nh</strong></p>
                                </td>
                                <td width="156">
                                    <p><strong>Ngoại th&agrave;nh</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" width="156">
                                    <p>H&agrave; Nội</p>
                                </td>
                                <td width="126">
                                    <p>0 kg &ndash; 3 kg</p>
                                </td>
                                <td width="120">
                                    <p>15.000</p>
                                </td>
                                <td width="156">
                                    <p>15.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="126">
                                    <p>+ 1 kg</p>
                                </td>
                                <td width="120">
                                    <p>3.000</p>
                                </td>
                                <td width="156">
                                    <p>3.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" width="156">
                                    <p>Hồ Ch&iacute; Minh</p>
                                </td>
                                <td width="126">
                                    <p>0 kg &ndash; 0,5 kg</p>
                                </td>
                                <td width="120">
                                    <p>16.000</p>
                                </td>
                                <td width="156">
                                    <p>17.500</p>
                                </td>
                            </tr>
                            <tr>

                                <td width="126">
                                    <p>0,5 kg &ndash; 5 kg</p>
                                </td>
                                <td width="120">
                                    <p>17.000</p>
                                </td>
                                <td width="156">
                                    <p>18.500</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="126">
                                    <p>+ 1 kg</p>
                                </td>
                                <td width="120">
                                    <p>3.000</p>
                                </td>
                                <td width="156">
                                    <p>3.000</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>&nbsp;</strong></p>
                    <ul>
                        <li>
                            Quy định nội th&agrave;nh v&agrave; ngoại th&agrave;nh tại H&agrave; Nội v&agrave; Hồ
                            Ch&iacute; Minh:
                        </li>
                    </ul>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="132">
                                    <p>Khu vực</p>
                                </td>
                                <td width="246">
                                    <p>Nội th&agrave;nh</p>
                                </td>
                                <td width="180">
                                    <p>Ngoại th&agrave;nh</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p>H&agrave; Nội</p>
                                </td>
                                <td width="246">
                                    <p>Q. Ba Đ&igrave;nh, Q. T&acirc;y Hồ, Q. Cầu Giấy, Q. Thanh Xu&acirc;n, Q.
                                        Ho&agrave;n Kiếm, Q.
                                        Đống
                                        Đa, Q. Hai B&agrave; Trưng</p>
                                </td>
                                <td width="180">
                                    <p>Q. Ho&agrave;ng Mai, Q. Bắc Từ Li&ecirc;m, Q. Nam Từ Li&ecirc;m, Q. Long
                                        Bi&ecirc;n, Q. H&agrave;
                                        Đ&ocirc;ng&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p>Hồ Ch&iacute; Minh</p>
                                </td>
                                <td width="246">
                                    <p>Q.1, Q.3, Q.4, Q.5, Q.6, Q.7, Q.8, Q.10, Q.11, Q. G&ograve; Vấp, Q. T&acirc;n
                                        B&igrave;nh, Q.
                                        T&acirc;n Ph&uacute;, Q. B&igrave;nh Thạnh, Q. Ph&uacute; Nhuận</p>
                                </td>
                                <td width="180">
                                    <p>Q.2, Q.9, Q.12, Q.Thủ Đức, Q.B&igrave;nh T&acirc;n</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </li>
        </ol>
        <p><strong>&nbsp;</strong></p>
        <ol start="2">
            <li><strong> </strong><strong>Dịch vụ gia tăng</strong></li>
            <table class="w-100 table-data" border=1>
                <tbody>
                    <tr>
                        <td width="144">
                            <p><strong>T&ecirc;n dịch vụ</strong></p>
                        </td>
                        <td width="414">
                            <p><strong>Mức cước</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="144">
                            <p><strong>Ph&iacute; thu hộ</strong></p>
                        </td>
                        <td width="414">
                            <p>&nbsp; Miễn ph&iacute;</p>
                            <p>&nbsp; Mức thu hộ tối đa l&agrave; 10.000.000 VNĐ</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="144">
                            <p><strong>Ph&iacute; khai gi&aacute;</strong></p>
                        </td>
                        <td width="414">
                            <p>&middot;&nbsp; Dưới 3.000.000 VNĐ miễn ph&iacute;</p>
                            <p>&middot;&nbsp; Từ 3.000.001 &ndash; 10.000.000 VNĐ
                                t&iacute;nh
                                ph&iacute; 1 % gi&aacute; trị h&agrave;ng h&oacute;a</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="144">
                            <p><strong>Ph&iacute; giao trả 1 phần</strong></p>
                        </td>
                        <td width="414">
                            <p>&middot;&nbsp; 50% cước ph&iacute; chiều đi</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="144">
                            <p><strong>Ph&iacute; chuyển ho&agrave;n</strong></p>
                        </td>
                        <td width="414">
                            <p>&middot;&nbsp; Miễn ph&iacute;</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="144">
                            <p><strong>Ph&iacute; h&agrave;ng cồng kềnh</strong></p>
                        </td>
                        <td width="414">
                            <p>&middot;&nbsp; Mỗi chiều kh&ocirc;ng qu&aacute; 30 cm</p>
                            <p>&middot;&nbsp; Với h&agrave;ng h&oacute;a c&oacute;
                                k&iacute;ch
                                thước lớn hơn 30 cm th&igrave; cần c&oacute; sự khảo s&aacute;t v&agrave; đ&aacute;nh
                                gi&aacute;
                                thực tế từ bộ phận vận h&agrave;nh</p>
                            <p>&middot;&nbsp; C&ocirc;ng thức quy đổi sẽ được t&iacute;nh
                                khi
                                một chiều lớn hơn 30 cm:</p>

                            <p>&nbsp;&nbsp;&nbsp;o&nbsp; Khối lượng quy đổi = [Chiều d&agrave;i (cm) x Chiều rộng (cm) x
                                Chiều cao
                                (cm)]
                                / 5.000
                            </p>
                            <p>&nbsp;&nbsp;&nbsp;o&nbsp; Khối lượng n&agrave;o lớn hơn th&igrave; t&iacute;nh theo khối
                                lượng
                                đ&oacute;
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </ol>
        <p><strong>&nbsp;</strong></p>
        <ol start="3">
            <li><strong> </strong><strong>Chiết khấu theo lượng đơn</strong></li>
        </ol>
        <p><em>Đối với khu vực H&agrave; Nội:</em></p>
        <table class="w-100 table-data" border=1>
            <tbody>
                <tr>
                    <td width="144">
                        <p><strong>Lượng đơn giao, trả th&agrave;nh c&ocirc;ng/ng&agrave;y</strong></p>
                    </td>
                    <td width="192">
                        <p><strong>Chiết khấu</strong></p>
                    </td>
                    <td width="216">
                        <p><strong>Kỳ thanh to&aacute;n</strong></p>
                    </td>
                </tr>
                <tr>

                    <td width="192">
                        <p>1.000 VNĐ/đơn</p>
                    </td>
                    <td width="216">

                        <p>&middot; Ng&agrave;y 15 h&agrave;ng th&aacute;ng</p>

                    </td>
                </tr>

            </tbody>
        </table>
        <p>&nbsp;</p>
        <p><em>Đối với kh&aacute;ch h&agrave;ng ở Hồ Ch&iacute; Minh:</em></p>
        <table class="w-100 table-data" border=1>
            <tbody>
                <tr>
                    <td width="144">
                        <p><strong>Lượng đơn giao, trả th&agrave;nh c&ocirc;ng/ng&agrave;y</strong></p>
                    </td>
                    <td width="192">
                        <p><strong>Chiết khấu</strong></p>
                    </td>
                    <td width="216">
                        <p><strong>Kỳ thanh to&aacute;n</strong></p>
                    </td>
                </tr>
                <tr>
                    <td width="144">
                        <p>Từ 100 đơn trở l&ecirc;n</p>
                    </td>
                    <td width="192">
                        <p>1.000 VNĐ/đơn</p>
                    </td>
                    <td width="216">
                        <p>&middot;&nbsp; Theo ng&agrave;y</p>
                        <p>&middot;&nbsp; Thứ 2 h&agrave;ng tuần</p>
                        <p>&middot;&nbsp; Ng&agrave;y 15 h&agrave;ng th&aacute;ng</p>
                        <p>&middot;&nbsp; Ng&agrave;y 5 th&aacute;ng tiếp theo</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p><strong><br />Lưu &yacute;: </strong>Lượng đơn được t&iacute;nh chiết khấu = Tổng số đơn giao, trả
            th&agrave;nh
            c&ocirc;ng / Số ng&agrave;y l&ecirc;n đơn</p>
        </ol>
        <ol>
            <li><strong> </strong><u></u><strong><u>NH&Agrave; VẬN CHUYỂN GHN EXPRESS</u></strong>
                <ol>
                    <li><strong> </strong><strong>Bảng gi&aacute; dịch vụ </strong>(đ&atilde; bao gồm VAT)</li>
                </ol>
                <ul>
                    <li><em> </em><em>Bảng gi&aacute; &aacute;p dụng từ 0 &ndash; 5 kg</em></li>
                </ul>
                <p><em>Đơn vị: VNĐ</em></p>
                <table class="w-100 table-data" border=1>
                    <tbody>
                        <tr>
                            <td width="66">
                                <p><strong>Tuyến</strong></p>
                            </td>
                            <td width="90">
                                <p><strong>Khối lượng</strong></p>
                            </td>
                            <td width="84">
                                <p><strong>Nội th&agrave;nh</strong></p>
                            </td>
                            <td width="96">
                                <p><strong>Huyện/x&atilde;</strong></p>
                            </td>
                            <td width="108">
                                <p><strong>Th&ecirc;m 0,5 kg (h&agrave;ng dưới 4 kg)</strong></p>
                            </td>
                            <td width="108">
                                <p><strong>Th&ecirc;m 0,5 kg (h&agrave;ng tr&ecirc;n 4 kg)</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3" width="66">
                                <p><strong>To&agrave;n quốc</strong></p>
                            </td>
                            <td width="90">
                                <p>0 kg &ndash; 0,5 kg</p>
                            </td>
                            <td colspan="2" width="180">
                                <p>24.000</p>
                            </td>
                            <td rowspan="3" width="108">
                                <p>4.000</p>
                            </td>
                            <td rowspan="3" width="108">
                                <p>7.000</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="90">
                                <p>0,5 kg &ndash; 1 kg</p>
                            </td>
                            <td colspan="2" width="180">
                                <p>26.000</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="90">
                                <p>1 kg &ndash; 2 kg</p>
                            </td>
                            <td colspan="2" width="180">
                                <p>29.000</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <ul>
                    <li><em> </em><em>Bảng gi&aacute; &aacute;p dụng từ 5 kg trở l&ecirc;n</em></li>
                </ul>
                <p><em>Đơn vị: VNĐ</em></p>
                <table class="w-100 table-data" border=1>
                    <tbody>
                        <tr>
                            <td width="120">
                                <p><strong>Tuyến</strong></p>
                            </td>
                            <td width="98">
                                <p><strong>Khối lượng</strong></p>
                            </td>
                            <td width="106">
                                <p><strong>Nội th&agrave;nh</strong></p>
                            </td>
                            <td width="108">
                                <p><strong>Huyện/x&atilde;</strong></p>
                            </td>
                            <td width="120">
                                <p><strong>Th&ecirc;m 1</strong><strong> </strong><strong>kg</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="120">
                                <p><strong>To&agrave;n quốc</strong></p>
                            </td>
                            <td width="98">
                                <p>5 kg</p>
                            </td>
                            <td colspan="2" width="214">
                                <p>39.000</p>
                            </td>
                            <td width="120">
                                <p>7.000</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </li>

            <p><strong>&nbsp;</strong></p>
            <ol start="2">
                <li><strong> </strong><strong>Dịch vụ gia tăng</strong></li>
            </ol>
            <table class="w-100 table-data" border=1>
                <tbody>
                    <tr>
                        <td width="119">
                            <p><strong>T&ecirc;n dịch vụ</strong></p>
                        </td>
                        <td width="433">
                            <p><strong>Mức cước</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="119">
                            <p><strong>Ph&iacute; thu hộ</strong></p>
                        </td>
                        <td width="433">
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Miễn ph&iacute;</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="119">
                            <p><strong>Ph&iacute; chuyển ho&agrave;n</strong></p>
                        </td>
                        <td width="433">
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Miễn ph&iacute;</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="119">
                            <p><strong>Ph&iacute; </strong><strong>khai gi&aacute;</strong><strong> </strong></p>
                        </td>
                        <td width="433">
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dưới 3.000.000 VNĐ miễn ph&iacute;</p>
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Từ 3.000.001 &ndash; 10.000.000 VNĐ
                                t&iacute;nh
                                ph&iacute; 0,5 % gi&aacute; trị h&agrave;ng h&oacute;a</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="119">
                            <p><strong>Ph&iacute; h&agrave;ng cồng kềnh</strong></p>
                        </td>
                        <td width="433">
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mỗi chiều kh&ocirc;ng qu&aacute; 50 cm
                            </p>
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C&ocirc;ng thức quy đổi sẽ được
                                t&iacute;nh
                                khi
                                một chiều lớn hơn 30 cm:</p>
                            <p>o&nbsp; Khối lượng quy đổi = [Chiều d&agrave;i (cm) x Chiều rộng (cm) x Chiều cao (cm)] /
                                5.000
                            </p>
                            <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khối lượng n&agrave;o lớn hơn
                                th&igrave;
                                t&iacute;nh theo khối lượng đ&oacute;</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </ol>
        <p><strong>&nbsp;</strong></p>
        <ol>
            <li>
                <strong> </strong><strong><u>NH&Agrave; VẬN CHUYỂN J&amp;T EXPRESS</u></strong>
                <ol>
                    <li><strong> </strong><strong>Bảng gi&aacute; dịch vụ </strong>(đ&atilde; bao gồm VAT)</li>
                </ol>
                <ul>
                    <li><strong><em> </em></strong><strong><em>Đi từ H&agrave;</em></strong><strong><em>
                                Nội</em></strong></li>

                    <p><em>Đơn vị: VNĐ</em></p>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="141">
                                    <p><strong><em>&nbsp;</em></strong><strong>Tuyến</strong></p>
                                </td>
                                <td width="199">
                                    <p><strong>Khối lượng</strong></p>
                                </td>
                                <td width="228">
                                    <p><strong>Mức Cước</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" width="141">
                                    <p><strong>Nội tỉnh <br />(H&agrave; Nội đi H&agrave; Nội)</strong></p>
                                </td>
                                <td width="199">
                                    <p>0 &ndash; 1 kg</p>
                                </td>
                                <td width="228">
                                    <p>18.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>1 &ndash; 2 kg</p>
                                </td>
                                <td width="228">
                                    <p>21.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>Mỗi 0,5 kg tiếp theo</p>
                                </td>
                                <td width="228">
                                    <p>2.500</p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="5" width="141">
                                    <p><strong>Li&ecirc;n tỉnh</strong></p>
                                </td>
                                <td width="199">
                                    <p>0 &ndash; 0,05 kg</p>
                                </td>
                                <td width="228">
                                    <p>22.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>0,05 &ndash; 0,5 kg</p>
                                </td>
                                <td width="228">
                                    <p>26.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>0,5 &ndash; 1 kg</p>
                                </td>
                                <td width="228">
                                    <p>29.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>1 &ndash; 2 kg</p>
                                </td>
                                <td width="228">
                                    <p>37.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="199">
                                    <p>Mỗi 0,5 kg tiếp theo</p>
                                </td>
                                <td width="228">
                                    <p>4.000</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p><em><u>Lưu &yacute;</u></em><em>: Cước ph&iacute; chuyển ho&agrave;n cho kh&aacute;ch h&agrave;ng
                            gửi
                            h&agrave;ng từ H&agrave; Nội</em></p>
                    <table class="w-75 table-data" style="margin:0px auto" border=1>
                        <tbody>
                            <tr>
                                <td width="205">
                                    <p><strong>Tỷ lệ ho&agrave;n trong th&aacute;ng</strong></p>
                                </td>
                                <td width="225">
                                    <p><strong>Ph&iacute; chuyển ho&agrave;n</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="205">
                                    <p>0 - 10%</p>
                                </td>
                                <td width="225">
                                    <p>Miễn ho&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="205">
                                    <p>&ge; 10%</p>
                                </td>
                                <td width="225">
                                    <p>50% cước ph&iacute; vận chuyển chiều đi</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mb-0"><em>C&ocirc;ng thức t&iacute;nh tỷ lệ ho&agrave;n trong th&aacute;ng như sau</em>
                    </p>
                    <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tỷ
                            lệ&nbsp;
                            ho&agrave;n
                            = Tổng đơn ho&agrave;n / (Tổng đơn gửi - Đơn hủy)</strong></p>
                    <p><strong>&nbsp;</strong></p>

                    <li><strong><em> </em></strong><strong><em>Đi từ TP Hồ Ch&iacute; Minh</em></strong></li>
                    <p class="text-right"><em>Đơn vị: VNĐ</em></p>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="133">
                                    <p><strong>Tuyến</strong></p>
                                </td>
                                <td width="216">
                                    <p><strong>Khối lượng</strong></p>
                                </td>
                                <td width="177">
                                    <p><strong>Mức cước</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" width="133">
                                    <p><strong>Nội tỉnh <br />(HCM đi HCM)</strong></p>
                                </td>
                                <td width="216">
                                    <p>0 kg &ndash; 2 kg</p>
                                </td>
                                <td width="177">
                                    <p>23.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="216">
                                    <p>Mỗi 0,5 kg tiếp theo</p>
                                </td>
                                <td width="177">
                                    <p>5.000</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><em>&nbsp;</em></p>
                    <p class="text-right"><em>Đơn vị: VNĐ</em></p>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="144">
                                    <p><strong>Tuyến</strong></p>
                                </td>
                                <td width="216">
                                    <p><strong>Khối lượng</strong></p>
                                </td>
                                <td width="170">
                                    <p><strong>Mức cước</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="5" width="144">
                                    <p><strong>Li&ecirc;n tỉnh</strong></p>
                                </td>
                                <td width="216">
                                    <p>0 kg &ndash; 0,2 kg</p>
                                </td>
                                <td width="170">
                                    <p>27.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="216">
                                    <p>0,2 kg &ndash; 0,5 kg</p>
                                </td>
                                <td width="170">
                                    <p>28.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="216">
                                    <p>0,5 kg &ndash; 1 kg</p>
                                </td>
                                <td width="170">
                                    <p>31.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="216">
                                    <p>1 kg &ndash; 2 kg</p>
                                </td>
                                <td width="170">
                                    <p>38.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="216">
                                    <p>Mỗi 0,5 kg tiếp theo</p>
                                </td>
                                <td width="170">
                                    <p>6.000</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><em>&nbsp;</em></p>
                    <p><em><u>Lưu &yacute;</u></em><em>: Cước ph&iacute; chuyển ho&agrave;n cho kh&aacute;ch h&agrave;ng
                            gửi
                            h&agrave;ng
                            từ
                            Hồ Ch&iacute; Minh</em></p>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="205">
                                    <p><strong>Tỷ lệ ho&agrave;n trong th&aacute;ng</strong></p>
                                </td>
                                <td width="225">
                                    <p><strong>Ph&iacute; chuyển ho&agrave;n</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="205">
                                    <p>0 - 10%</p>
                                </td>
                                <td width="225">
                                    <p>Miễn ho&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="205">
                                    <p>&ge; 10%</p>
                                </td>
                                <td width="225">
                                    <p>50% cước ph&iacute; vận chuyển chiều đi</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><em>&nbsp;</em></p>
                    <p><em>C&ocirc;ng thức t&iacute;nh tỷ lệ ho&agrave;n trong th&aacute;ng như sau</em></p>
                    <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tỷ
                            lệ&nbsp;
                            ho&agrave;n
                            =
                            Tổng
                            đơn ho&agrave;n / (Tổng đơn gửi - Đơn hủy)</strong></p>
                    <p><strong>&nbsp;</strong></p>
                    <ol start="2">
                        <li><strong> </strong><strong>Dịch vụ gia tăng</strong></li>
                    </ol>
                    <table class="w-100 table-data" border=1>
                        <tbody>
                            <tr>
                                <td width="132">
                                    <p><strong>T&ecirc;n dịch vụ</strong></p>
                                </td>
                                <td width="433">
                                    <p><strong>Mức ph&iacute;</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p><strong>Ph&iacute; thu hộ</strong></p>
                                </td>
                                <td width="433">
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Miễn ph&iacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p><strong>Ph&iacute; chuyển ho&agrave;n</strong></p>
                                </td>
                                <td width="433">
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dựa theo tỷ lệ ho&agrave;n
                                        thực tế</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p><strong>Ph&iacute; </strong><strong>khai gi&aacute;</strong><strong> </strong>
                                    </p>
                                </td>
                                <td width="433">
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1,1 % gi&aacute; trị
                                        h&agrave;ng h&oacute;a
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="132">
                                    <p><strong>Ph&iacute; h&agrave;ng cồng kềnh</strong></p>
                                </td>
                                <td width="433">
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mỗi chiều kh&ocirc;ng
                                        qu&aacute; 50 cm</p>
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C&ocirc;ng thức quy đổi sẽ
                                        được t&iacute;nh
                                        khi
                                        một chiều lớn hơn 30 cm:</p>
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khối lượng quy đổi = [Chiều
                                        d&agrave;i (cm) x
                                        Chiều rộng (cm) x Chiều cao (cm)] / 6.000</p>
                                    <p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khối lượng n&agrave;o lớn hơn
                                        th&igrave;
                                        t&iacute;nh theo khối lượng đ&oacute;</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </ul>
            </li>
        </ol>
        <p><strong>ĐIỀU 2. HIỆU LỰC</strong></p>
        <ul>
            <li>Phụ lục n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y
                <?= date('d')?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave;
                phần
                kh&ocirc;ng thể t&aacute;ch rời của Hợp đồng.</li>
            <li>Phụ lục n&agrave;y được lập th&agrave;nh hai (02) bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như
                nhau,
                mỗi b&ecirc;n giữ một (01) bản.</li>
        </ul>
        <table width="613" style="margin: 0 auto;">
            <tbody>
                <tr>
                    <td width="303">
                        <img src="<?php echo base_url('/public/images/pgdsign.png') ?>" alt="">
                    </td>
                    <td width="309" style="text-align: center;">
                        <p><strong>ĐẠI DIỆN BÊN B</strong></p>
                        <p><strong>
                                <?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>
                                <?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p><strong>&nbsp;</strong></p>
        <p><strong>&nbsp;</strong></p>
        <p><strong>PHỤ LỤC 03</strong></p>
        <p><strong>DANH S&Aacute;CH T&Agrave;I KHOẢN DỊCH VỤ</strong></p>
        <p><em>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c Dịch vụ vận chuyển <strong>số
                    [<?= date('d')?><?= date('m') ?>]
                    /<?= date('Y')?>/HĐHT/FINTECH/IMEDIA
                    &ndash;<em><strong>[<?= $acronym; ?>/<?= $companyName; ?>] </strong></em><em>giữa c&ocirc;ng ty
                        C&ocirc;ng ty
                        Cổ
                        phần
                        C&ocirc;ng nghệ v&agrave; Dịch vụ IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;)&nbsp;
                        v&agrave;&nbsp;
                        <em><strong>[<?= $acronym; ?>] &ndash; [<?= $companyName; ?>]</strong></em>
                        (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave;
                        &ldquo;<strong>Hợp đồng</strong>&rdquo;)</em></p>
        <p><strong>&nbsp;</strong></p>
        <p><strong>ĐIỀU 1. DANH S&Aacute;CH T&Agrave;I KHOẢN</strong></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Danh s&aacute;ch c&aacute;c ID (t&agrave;i
            khoản
            đăng nhập Holaship.vn) sau đ&acirc;y đều thuộc kh&aacute;ch h&agrave;ng [t&ecirc;n KH]:</p>
        <table class="w-100 table-data" border=1>
            <tbody>
                <tr>
                    <td width="49">
                        <p><strong>&nbsp;STT</strong></p>
                    </td>
                    <td width="102">
                        <p><strong>ID đăng nhập</strong></p>
                    </td>
                    <td width="100">
                        <p><strong>T&ecirc;n shop</strong></p>
                    </td>
                    <td width="245">
                        <p><strong>T&agrave;i khoản ng&acirc;n h&agrave;ng th&agrave;nh to&aacute;n COD</strong></p>
                    </td>
                    <td width="154">
                        <p><strong>Email</strong></p>
                    </td>
                </tr>
                <tr>
                    <td width="49">
                        <p style="font-style: initial;">1</p>
                    </td>
                    <td width="102">
                        <p style="font-style: initial;"><?php echo $dataUser->username; ?></p>
                    </td>
                    <td width="100">
                        <p style="font-style: initial;">
                            <?php echo ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company; ?>
                        </p>
                    </td>
                    <td width="245">
                        <p style="font-style: initial;">- Chủ tài khoản:
                            <?php echo (!empty($listBanks)) ? $listBanks->bankAccountName : ''; ?></p>
                        <p style="font-style: initial;">- Số tài khoản:
                            <?php echo (!empty($listBanks)) ? $listBanks->bankAccount : ''; ?></p>
                        <p style="font-style: initial;">- Ngân hàng:
                            <?php echo (!empty($listBanks)) ? $listBanks->bankName : ''; ?></p>
                    </td>
                    <td width="154">
                        <p style="font-style: initial;"><?php echo $dataUser->email; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p><strong>ĐIỀU 2. HIỆU LỰC</strong></p>
        <ul>
            <li>Phụ lục n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y
                <?= date('d')?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave;
                phần
                kh&ocirc;ng thể t&aacute;ch rời của Hợp đồng.</li>
            <li>Phụ lục n&agrave;y được lập th&agrave;nh hai (02) bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như
                nhau,
                mỗi b&ecirc;n giữ một (01) bản.</li>
        </ul>
        <table width="613" style="margin: 0 auto;">
            <tbody>
                <tr>
                    <td width="303">
                        <img src="<?php echo base_url('/public/images/pgdsign.png') ?>" alt="">
                    </td>
                    <td width="309" style="text-align: center;">
                        <p><strong>ĐẠI DIỆN BÊN B</strong></p>
                        <p><strong>
                                <?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:300px" alt="">
                        <p><strong>&nbsp;</strong></p>
                        <p><strong>
                                <?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                            </strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>