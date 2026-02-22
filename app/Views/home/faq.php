<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Câu hỏi thường gặp</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">FAQ</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="faq-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            Câu hỏi phổ biến nhất
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Quản lý tài khoản</a>
                        <a href="#" class="list-group-item list-group-item-action">Sử dụng bảng điều khiển</a>
                        <a href="#" class="list-group-item list-group-item-action">Phương thức thanh toán</a>
                        <a href="#" class="list-group-item list-group-item-action">Thông tin giao hàng</a>
                        <a href="#" class="list-group-item list-group-item-action">Hướng dẫn theo dõi đơn hàng</a>
                        <a href="<?= BASE_URL ?>home/returnPolicy" class="list-group-item list-group-item-action">Chính sách hoàn tiền</a>
                        <a href="#" class="list-group-item list-group-item-action">Ưu đãi và giảm giá</a>
                        <a href="#" class="list-group-item list-group-item-action">Điều khoản & Điều kiện</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span><i class="far fa-question"></i></span> Tôi có cần tài khoản để đặt hàng không?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Bạn hoàn toàn có thể đặt hàng với tư cách khách. Tuy nhiên, việc tạo tài khoản sẽ giúp bạn quản lý đơn hàng tốt hơn, theo dõi hành trình vận chuyển và nhận được các ưu đãi đặc biệt dành riêng cho thành viên.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span><i class="far fa-question"></i></span> Các phương thức thanh toán được chấp nhận là gì?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Chúng tôi chấp nhận nhiều phương thức thanh toán linh hoạt bao gồm: Thanh toán khi nhận hàng (COD), Chuyển khoản ngân hàng, và các loại thẻ tín dụng phổ biến như Visa, Mastercard.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <span><i class="far fa-question"></i></span> Thời gian giao hàng mất bao lâu?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Thời gian giao hàng tiêu chuẩn thường mất từ 2-5 ngày làm việc tùy thuộc vào địa chỉ của bạn. Đối với các đơn hàng hỏa tốc trong nội thành, bạn có thể nhận hàng ngay trong ngày.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <span><i class="far fa-question"></i></span> Cửa hàng có giảm giá cho khách hàng thân thiết không?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Có, chúng tôi thường xuyên có các chương trình tích điểm và mã giảm giá đặc biệt gửi qua email cho những khách hàng đã từng mua sắm tại hệ thống của Mocart.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    <span><i class="far fa-question"></i></span> Tôi có thể theo dõi đơn hàng của mình bằng cách nào?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Ngay sau khi đơn hàng được gửi đi, bạn sẽ nhận được một mã vận đơn qua email. Bạn có thể sử dụng mã này trong trang "Theo dõi đơn hàng" trên website của chúng tôi để cập nhật tình trạng mới nhất.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <span><i class="far fa-question"></i></span> Điều kiện để được hoàn tiền sản phẩm là gì?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sản phẩm có thể được hoàn tiền nếu bị lỗi do nhà sản xuất hoặc hư hỏng trong quá trình vận chuyển. Bạn vui lòng giữ nguyên bao bì và liên hệ với chúng tôi trong vòng 7 ngày kể từ khi nhận hàng.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>