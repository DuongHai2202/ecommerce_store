-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 09, 2025 lúc 09:06 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` enum('Admin','Staff') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(12, 'CHOLIMEX', 'cholimex', 'Active', NULL, NULL),
(13, 'CHINSU', 'chinsu', 'Active', NULL, NULL),
(14, 'MAGGI', 'maggi', 'Active', NULL, NULL),
(15, 'CP', 'cp', 'Active', NULL, NULL),
(16, 'MEAT DELI', 'meat-deli', 'Active', NULL, NULL),
(17, 'WINECO', 'wineco', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Đồ uống', 'do-uong', 'Active', NULL, NULL, NULL),
(9, 'Thịt tươi', 'thit-tuoi', 'Active', NULL, NULL, NULL),
(10, 'Trái cây - Hạt', 'trai-cay-hat', 'Active', NULL, NULL, NULL),
(11, 'Rau củ', 'rau-cu', 'Active', NULL, NULL, '../img/Categories_rau-cu.png'),
(12, 'Thức ăn nhanh', 'thuc-an-nhanh', 'Active', NULL, NULL, NULL),
(13, 'Quà tặng tết', 'qua-tang-tet', 'Active', NULL, NULL, NULL),
(14, 'Thực phẩm khô', 'thuc-pham-kho', 'Active', NULL, NULL, NULL),
(15, 'Gia vị', 'gia-vi', 'Active', NULL, NULL, NULL),
(16, 'Đồ gia dụng', 'do-gia-dung', 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_123426_create_admins_table', 1),
(6, '2023_10_03_130747_create_categories_table', 2),
(7, '2023_10_03_130946_create_brands_table', 2),
(8, '2023_10_03_132635_create_products_table', 3),
(9, '2023_10_03_135606_create_reviews_table', 4),
(10, '2023_10_04_080710_create_orders_table', 5),
(11, '2023_10_04_081411_create_order_details_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint NOT NULL,
  `title` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `sumary` text NOT NULL,
  `description` text NOT NULL,
  `newscategory_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `avatar`, `slug`, `sumary`, `description`, `newscategory_id`, `created_at`, `updated_at`) VALUES
(33, 'Chuyển phát nhanh qua Bưu điện tốn bao nhiêu thời gian?', 'uploads/news677e9031a10b8chuyen-phat-buu-dien.jpg', '', ' Chuyển phát nhanh là hình thức chuyển phát trong thời gian sớm nhất bằng đường bộ, đường hàng không, đường thủy… Chính vì thế mà thời gian chuyển hàng sẽ được rút ngắn hơn rất nhiều so với chuyển phát thường (chuyển phát chậm qua đường bộ). Hãy cùng Phần mềm bán hàng đa kênh Nhanh.vn tìm hiểu về thời gian vận chuyển hàng của bưu điện nhé.                               ', 'Chuyển phát nhanh là hình thức chuyển phát trong thời gian sớm nhất bằng đường bộ, đường hàng không, đường thủy… Chính vì thế mà thời gian chuyển hàng sẽ được rút ngắn hơn rất nhiều so với chuyển phát thường (chuyển phát chậm qua đường bộ). Hãy cùng Phần mềm bán hàng đa kênh Nhanh.vn tìm hiểu về thời gian vận chuyển hàng của bưu điện nhé.\r\n\r\n20230308_PhimnTCqo0ra1CxN.png\r\n\r\nNội dung chính\r\n\r\n1. Thời gian gửi chuyển phát nhanh bưu điện mất bao lâu?\r\nThông thường, thời gian chuyển phát nhanh bưu điện được tính từ thời điểm hàng bắt đầu được chuyển đi đến thời gian nhận hàng. Đối với các khu vực nội thành, các tỉnh lân cận, các miền trên toàn quốc sẽ khoảng 1 - 3 ngày làm việc.\r\n\r\nthời gian gửi hàng mất bao lâu\r\n\r\nChuyển phát nhanh của Bưu điện\r\n\r\n2. Thời gian chuyển phát thường bưu điện mất bao lâu?\r\nNếu bạn có dự định sử dụng hình thức chuyển phát chậm thì nên dự tính trước khoảng thời gian giao hàng sẽ rất dài. Vì nhiều bưu điện thường gom hàng rồi mới chuyển cùng đợt nên bạn sẽ phải đợi một khoảng thời gian.\r\n\r\nVậy gửi hàng bưu điện mất bao lâu? Giao hàng chuyển phát chậm bưu điện thường sẽ mất nhiều thời gian hơn chuyển phát nhanh từ 2 – 3 ngày và cước phí sẽ ít hơn nhiều so với chuyển phát nhanh. Bạn nên gửi hàng vào buổi sáng để chiều được chuyển hàng luôn, nếu gửi hàng vào buổi chiều có thể phải sang đến chiều hôm sau hàng hóa của bạn mới được gửi đi.\r\n\r\nXem thêm:\r\n\r\nTiền cod là gì? Kiến thức tổng hợp về tiền COD không thể bỏ qua\r\nHướng dẫn chi tiết cách nhận tiền ship cod bưu điện đơn giản nhất\r\n3. Dịch vụ chuyển phát nhanh của Nhanh.vn\r\nNhằm phục phụ khách hàng và các doanh nghiệp online một cách tốt nhất, các đơn vị vận chuyển hiện nay đều cung cấp dịch vụ chuyển phát nhanh với thời gian ngày càng được rút ngắn và cước phí rất cạnh tranh. Cả 4 đối tác vận chuyển của Nhanh.vn là Vietnam Post, Viettel Post, Giaohangnhanh và Giaohangtietkiem đều đang cung cấp dịch vụ chuyển phát nhanh. Để khách hàng dễ dàng so sánh cước phí giữa các hãng vận chuyển đưa ra quyết định nhanh chóng.\r\n\r\nTra cước vận chuyển - Dễ dàng so sánh cước phí giữa các hãng vận chuyển\r\n\r\ntra cước ngay\r\n\r\n4. Hướng dẫn gửi hàng qua Bưu điện\r\nĐể thực hiện gửi đồ qua bưu điện, bạn cần tiến hành theo các bước hướng dẫn sau đây:\r\n\r\nBước 1: Đóng gói bưu phẩm, hàng hóa\r\nSau khi đã chuẩn bị được hàng hóa muốn gửi và biết được thời gian gửi Bưu điện chuyển phát nhanh mất bao lâu, bạn tiến hành đóng gói cẩn thận sản phẩm hàng hóa.\r\n\r\nĐối với những loại hàng hóa dễ vỡ, bạn cần chú ý đóng gói kỹ càng hơn, chèn xốp hoặc các vật liệu chống va đập, dán nhãn trên thùng.\r\n\r\nBước 2: Thực hiện các thủ tục gửi hàng theo hướng dẫn\r\nHàng hóa đã được đóng gói, bạn mang đến địa chỉ bưu điện gần nhất để gửi hàng. Bạn cần chuẩn bị một số thông tin sau để việc gửi hàng được thuận tiện và nhanh nhất:\r\n\r\n- Thông tin về loại hàng hóa gửi\r\n\r\n   - Tên, số điện thoại, địa chỉ người gửi\r\n\r\n   - Tên, số điện thoại, địa chỉ người nhận\r\n\r\nBước 3: Thanh toán cước phí\r\nCăn cứ vào khối lượng bưu gửi và loại hình chuyển phát nhanh hay chậm mà sẽ có mức cước phí dịch vụ khác nhau, nhân viên bưu điện sẽ thông báo cụ thể cho bạn. Đồng thời căn cứ vào loại hình dịch vụ sử dụng, bạn cũng biết được cụ thể thời gian giao hàng.\r\n\r\nTìm hiểu thêm:\r\n\r\nKinh doanh hàng ký gửi cần chuẩn bị những gì?\r\nĐối soát chênh lệch COD trên sàn thương mại điện tử\r\nCách quản lý tiền cod, đối soát trong vận chuyển nhanh chóng chính xác nhất\r\nChuyển phát nhanh qua bưu điện mất bao lâu? Chuyển phát nhanh liên tỉnh sẽ dao động trong khoảng 1.5 - 2 ngày.\r\n\r\nChuyển phát nhanh trong ngày: Áp dụng cho việc chuyển phát nhanh hàng hóa, bưu phẩm trong nội tỉnh hoặc nội thành.\r\n\r\nĐể tiết kiệm thời gian và chi phi gửi hàng hóa, bạn nên sử dụng dịch vụ Nhanh.Ship của chúng tôi. Với rất nhiều lợi ích và ưu đãi đang đón chờ bạn. Hãy click vào CTA ở dưới để biết thêm thông tin dịch vụ giá rẻ này.\r\n\r\nBán hàng trên sàn TMĐT, Tiktok Shop hiệu quả - chuyên nghiệp\r\nTiết kiệm tối đa thời gian và chi phí vận hành\r\nBáo cáo chi tiết đánh giá hiệu quả kinh doanh\r\n\r\nTư vấn miễn phí\r\n\r\nBáo cáo tài chính sàn\r\n\r\n5. Dịch vụ chuyển phát nhanh của VNPost\r\nDịch vụ vận chuyển VNPost được cung cấp bởi Tổng công ty Bưu điện Việt Nam, trực thuộc tập đoàn VNPT. VNPost là đơn vị vận chuyển lớn nhất cả nước, với hệ thống chi nhánh tại tất cả các tỉnh thành, đội ngũ nhân viên đông đảo và đa dạng các dịch vụ cho khách hàng lựa chọn.\r\n\r\nLà đơn vị có vốn nhà nước, nên thế mạnh của VNPost chính là mức phí vận chuyển rất cạnh tranh, và có thể gửi hàng đến khắp mọi miền tổ quốc.\r\n\r\nDịch vụ chuyển phát nhanh của VNPost (hay còn gọi là EMS) được áp dụng trên phạm vi toàn quốc, mức cước phí phải chăng và thời gian giao hàng được quy định trước. Ưu điểm của dịch vụ chuyển phát nhanh do VNPost cung cấp chính là sự trải rộng trên khắp các tỉnh thành trong cả nước, bưu phẩm được bảo quản cẩn thận và giá cước rẻ hơn các hãng khác. Ngoài ra VNPost còn hỗ trợ thay đổi COD đơn hàng đang chuyển: Trong 4 đối tác vận chuyển của Nhanh.vn thì duy nhất dịch vụ vận chuyển VNPost là có hỗ trợ thay đổi COD đơn hàng đang chuyển. Đây là một chính sách rất linh hoạt đối với khách hàng sử dụng dịch vụ vận chuyển thu tiền hộ (COD).\r\n\r\nbảng giá vnpost\r\n\r\n6. Dịch vụ chuyển phát nhanh của Viettel Post\r\nCùng với Vnpost, Viettel post cũng là đơn vị cung cấp dịch vụ chuyển phát nhanh trong phạm vi toàn quốc. Cước phí của dịch vụ chuyển phát nhanh Viettel được tính dựa trên trọng lượng và khoảng cách tính theo số km từ nơi gửi đến nơi nhận. Khoảng cách này được chia thành các mức: Đến 100 km, đến 300 km và trên 300 km. \r\n\r\nbảng giá viettel post\r\n\r\n7. Dịch vụ chuyển phát nhanh của Giaohangnhanh\r\nĐúng như tên gọi của mình, Giaohangnhanh hiện đang cung cấp dịch vụ chuyển phát nhanh trong thời gian rất ngắn (có gói giao nhanh 60 phút), đây là ưu điểm của Giaohangnhanh so với các đơn vị vận chuyển khác, tuy nhiên mức cước phí của dịch vụ chuyển phát nhanh của hãng này thường cao hơn.\r\n\r\nbảng giá ghn\r\n\r\nGiao hàng nhanh Express\r\n\r\nbảng giá giao hàng nhanh\r\n\r\nBảng giá GHN\r\n\r\n8. Dịch vụ chuyển phát nhanh của Giaohangtietkiem\r\nĐây cũng là dịch vụ duy nhất mà Giaohangtietkiem hiện đang cung cấp, nói cách khác, nếu đang dùng Giaohangtietkiem tức là bạn đang dùng dịch vụ chuyển phát nhanh. Không trải rộng địa bàn phục vụ như các hãng khác, Giaohangtietkiem chỉ tập trung vận chuyển nội tỉnh và liên vùng giữa 2 thành phố là Hà Nội và TP HCM. Bù lại, cước phí của Giaohangtietkiem rất cạnh tranh và thời gian giao hàng rất ngắn.\r\n\r\nCó thể bạn quan tâm:\r\n\r\nRủi ro hàng gửi thường gặp và những cách khắc phục\r\nƯu - nhược điểm của hình thức thanh toán COD\r\nbảng giá ghtk\r\n\r\nBảng giá GHTK từ Hà Nội và TP. Hồ Chí Minh\r\n\r\nbảng giá giao hàng tiết kiệm\r\n\r\nBảng giá GHTK 63 tỉnh thành phố\r\n\r\nCổng vận chuyển thu hộ toàn quốc hiệu quả nhanh gọn Nhanh.Ship\r\n\r\nDùng thử miễn phí\r\n\r\n9. Lời kết\r\nKhi sử dịch dịch vụ vận chuyển VNPost qua Nhanh.vn thì khách hàng sẽ tiết kiệm được cả thời gian lẫn chi phí: \r\n\r\nGiao nhận hàng tận nơi, không cần mang hàng ra bưu điện, bưu cục\r\nNhận tiền thu hộ đều đặn qua tài khoản Ngân hàng/ Bảo kim 3 lần/tuần\r\nChính sách chiết khấu: Luôn cập nhật theo chính sách mới nhất của của các nhà cung cấp. Bạn sẽ được hưởng mức chiết khấu tùy theo sản lượng tổng cước đơn hàng theo đúng quy định của các nhà cung cấp dịch vụ.\r\nHy vọng rằng bài viết đã mang lại những thông tin hữu ích để bạn có thể chọn cho dịch vụ vận chuyển phù hợp nhất!                                ', 5, '2025-01-08 21:48:17', '2025-01-08 21:48:17'),
(34, 'Top 10 phần mềm ghép mặt vào ảnh người khác dễ dùng và phổ biến nhất năm 2024', 'uploads/news677e9103469ebhinh-anh-tin-tuc.jpg', 'top-10-ph-n-m-m-gh-p-m-t-v-o-nh-ng-i-kh-c-d-d-ng-v-ph-bi-n-nh-t-n-m-2024', 'Bạn đang mong muốn tìm kiếm một ứng dụng có thể ghép mặt của bạn vào các hình ảnh có sẵn? Hay bạn muốn đóng vai một siêu anh hùng, nhân vật cổ trang trong phim? \r\n\r\nBài viết dưới đây, Nhanh.vn sẽ giới thiệu đến cho bạn Top 10 phần mềm ghép mặt vào ảnh người khác trên điện thoại dễ dùng và phổ biến nhất năm 2024 nhé!', 'Bạn đang mong muốn tìm kiếm một ứng dụng có thể ghép mặt của bạn vào các hình ảnh có sẵn? Hay bạn muốn đóng vai một siêu anh hùng, nhân vật cổ trang trong phim? \r\n\r\nBài viết dưới đây, Nhanh.vn sẽ giới thiệu đến cho bạn Top 10 phần mềm ghép mặt vào ảnh người khác trên điện thoại dễ dùng và phổ biến nhất năm 2024 nhé!\r\n\r\nghép mặt vào ảnh người khác\r\n\r\nNội dung chính\r\n\r\n1. PicsArt\r\nPicsArt Photo Editor & Collage là một trong những phần mềm ghép mặt vào ảnh miễn phí tốt nhất hiện nay. Bên cạnh đó, ứng dụng này được hợp nhiều công cụ xử lý ảnh, video mạnh mẽ giúp bạn biến hóa được bức ảnh theo nhiều phong cách khác nhau để tạo ấn tượng cho người xem. Nó thực sự có thể thay thế cho Adobe Photoshop nếu bạn chỉ muốn chỉnh sửa ảnh đơn giản mà không tốn quá nhiều thời gian. \r\n\r\nƯu điểm nổi trội của phần mềm:\r\nChỉnh sửa ảnh: Thêm hiệu ứng, bộ lọc, xóa phông nền, thêm chữ và thêm sticker cho ảnh…\r\n\r\nBiên tập video: Tạo, biên tập và chỉnh sửa video dễ dàng, thêm nhạc, thêm hiệu ứng vào video…\r\n\r\nTạo ảnh ghép: Tạo ảnh ghép theo xu hướng từ các bức ảnh yêu thích của bạn, thêm tính năng chia sẻ với bạn bè…\r\n\r\nCó các công cụ vẽ giúp bạn thỏa sức sáng tạo của bản thân\r\n\r\nNgoài bản miễn phí, phần mềm còn có dịch vụ trả phí để có đăng ký bản PICSART GOLD, khi dùng, bạn sẽ không phải xem quảng cáo và trải nghiệm các nội dung mới, độc quyền.\r\n\r\nTải phần mềm PicsArt:\r\n\r\nggplay appstore\r\n\r\n​PicsArt - Phần mềm ghép mặt vào ảnh được sử dụng rộng rãi\r\n\r\nPicsArt - Phần mềm ghép mặt vào ảnh được sử dụng rộng rãi\r\n\r\nHướng dẫn chỉnh sửa ảnh trên điện thoại bằng Picsart:\r\n\r\n\r\nXem thêm:  Bắt trend với cách ghép mặt vào video trên TikTok siêu đơn giản\r\n\r\n2. FaceArt\r\nFaceApp là phần mềm ghép mặt vào ảnh sử dụng trí tuệ nhân tạo trên di động tốt nhất với hơn 500 triệu lượt tải tính đến thời điểm hiện tại. Ứng dụng này giúp bạn có một bức ảnh selfie như chân dung của người mẫu chỉ bằng một chạm mà không cần mất nhiều thời gian chỉnh sửa trên photoshop nữa!\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nTrình chỉnh ảnh: tạo ảnh chỉnh sửa hoàn hảo với bộ lọc Impression, tính năng xóa nếp nhăn, thêm râu, chỉnh kiểu tóc,…\r\n\r\nSử dụng AI giúp bạn cảm thấy giải trí với những bức ảnh của mình như thay đổi giới tính, độ tuổi…\r\n\r\nCho phép chia sẻ ảnh đã chỉnh sửa trên FaceArt tiếp lên các mạng xã hội\r\n\r\nTrình chỉnh video: chỉnh sửa video, áp dụng các bộ lọc cho video\r\n\r\nTải ứng dụng FaceArt:\r\n\r\nggplay appstore\r\n\r\n​Ứng dụng ghép mặt vào ảnh miễn phí - FaceApp\r\n\r\nỨng dụng ghép mặt vào ảnh miễn phí - FaceApp\r\n\r\nĐọc thêm: Top 5 phần mềm ghép ảnh trên máy tính chuyên nghiệp năm 2024\r\n\r\n3. Microsoft Face Swap\r\nMicrosoft Face Swap có lẽ là một ứng dụng ghép mặt vào ảnh quen thuộc với nhiều người. Đây là một ứng dụng có sẵn miễn phí trên hệ điều hành Android và khá chuyên nghiệp hiện nay. Microsoft Face Swap cho phép bạn ghép mặt vào ảnh người khác hoặc hoán đổi khuôn mặt cực kỳ hài hước.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nGiao diện app ghép mặt và chỉnh sửa ảnh này được thiết kế đơn giản, dễ sử dụng\r\n\r\nTrong một ảnh, bạn có thể trao đổi tối đa 6 khuôn mặt\r\n\r\nTạo hiệu ứng cho khuôn mặt hay hoán đổi khuôn mặt với các người nổi tiếng\r\n\r\nLưu ảnh và chia sẻ lên mạng xã hội dễ dàng\r\n\r\nLink tải:\r\n\r\nLink tải ứng dụng Microsoft Face Swap cho Android: ggplay \r\n\r\n​Giao diện app ghép mặt vào ảnh - Microsoft Face Swap\r\n\r\nGiao diện app ghép mặt vào ảnh - Microsoft Face Swap\r\n\r\n4. Face Swap Live\r\nFace Swap Live là ứng dụng ghép mặt vào ảnh mà cũng bạn không nên bỏ qua. Ứng dụng thì cho phép bạn có thể ghép mặt vào ảnh bất kỳ hoặc thực hiện hoán đổi khuôn mặt với người khác một cách hoàn hảo trong thời gian thực.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nGhép mặt vào ảnh người khác đơn giản, nhanh chóng, chuyên nghiệp\r\n\r\nHoán đổi khuôn mặt trong thời gian thực với bạn bè\r\n\r\nNgoài ghép ảnh, ứng dụng này còn cho phép bạn thực hiện hoán đổi hoặc cắt ghép khuôn mặt lúc quay video\r\n\r\nThêm các nhãn dán đơn giản như ria mép, các phụ kiện\r\n\r\nCó thể chia sẻ trực tiếp ảnh và video lên mạng xã hội sau khi chỉnh sửa xong.\r\n\r\nTải Face Swap:\r\n\r\nggplay appstore\r\n\r\nChỉnh sửa khuôn mặt với Face Swap Live:\r\n\r\n\r\n\r\nXem thêm: Top 8 phần mềm ghép mặt vào video độc đáo cho bạn những bức ảnh vô cùng đẹp\r\n\r\n5. MixBooth\r\nPhần mềm ghép mặt vào ảnh tiếp theo mà chúng tôi muốn giới thiệu tiếp đến bạn là MixBooth. Đây là một ứng dụng miễn phí cho bạn hoán đổi, cắt ghép khuôn mặt với người khác trên điện thoại mà không cần kết nối với Internet.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nCó thể hoán đổi khuôn mặt trên điện thoại mà không cần kết nối mạng\r\n\r\nHoán đổi, ghép mặt nhanh chóng\r\n\r\nCó nhiều hiệu ứng và nhãn dán để bạn thỏa sức lựa chọn\r\n\r\nGiao diện app ghép mặt vào ảnh này khá đơn giản và dễ sử dụng\r\n\r\nCho phép chia sẻ, gửi cho bạn bè cùng xem\r\n\r\nTải MixBooth:\r\n\r\n appstore\r\n\r\n​Ứng dụng ghép mặt vào ảnh MixBooth\r\n\r\nỨng dụng ghép mặt vào ảnh MixBooth\r\n\r\nĐọc thêm: Top 11 phần mềm ghép ảnh cho hội đam mê sống ảo\r\n\r\n6. Face Swap Booth\r\nFace Swap Booth là một ứng dụng ghép mặt vào ảnh tiên tiến hiện nay. App này giúp bạn ghép mặt hoặc hoán đổi khuôn mặt với người khác một cách nhanh chóng. Với Face Swap Booth, bạn sẽ tạo ra những hình ảnh hài hước và độc đáo.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nThay thế hoặc hoán đổi nhiều khuôn mặt trên ảnh, hướng dẫn cách ghép ảnh với nhiều kích cỡ ảnh chụp khác nhau\r\n\r\nCông cụ chỉnh sửa nâng cao có thể pha trộn nhiều hình ảnh một cách hoàn hảo\r\n\r\nCó tính năng nhận diện khuôn mặt một cách tự động\r\n\r\nỨng dụng hỗ trợ lưu ảnh với chất lượng cao\r\n\r\nTải Face Swap Booth:\r\n\r\nggplay appstore\r\n\r\nỨng dụng Face Swap Booth\r\n\r\nỨng dụng Face Swap Booth\r\n\r\nCó thể bạn quan tâm: Top những phần mêm chỉnh sửa và ghép ảnh cực hiệu quả\r\n\r\n7. PicLab\r\nNếu bạn không biết làm cách nào để cắt ghép ảnh sống ảo, giải pháp cho bạn là phần mềm Piclab. Ứng dụng này có nhiều hiệu năng mạnh mẽ giúp bạn chỉnh sửa những bức ảnh một cách đơn giản, chuyên nghiệp.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nCó nhiều bộ lọc tuyệt đẹp và hiệu ứng chỉnh ảnh cho nhiều mục đích chụp ảnh khác nhau\r\n\r\nGiao diện app đơn giản, thân thiện với người dùng\r\n\r\nDễ dàng để chỉnh sửa các hình ảnh theo mong muốn của bản\r\n\r\nChia sẻ liên kết online những bức ảnh đẹp lên mạng xã hội hoặc cho bạn bè qua tin nhắn\r\n\r\nTải PicLab:\r\n\r\nggplay appstore\r\n\r\n​PicLab- Trình chỉnh sửa ảnh\r\n\r\nTrình chỉnh sửa ảnh - PicLab\r\n\r\n8. Meitu\r\nMeitu là phần mềm ghép mặt vào ảnh được rất nhiều bạn trẻ yêu thích hiện nay. Meitu được miêu tả là một phần mềm có thể biến bạn trở nên dễ thương hơn, cho phép bạn xuất hiện trên màn hình với một diện mạo mới cùng đầy đủ những hiệu ứng vô cùng dễ thương. Vậy nên bạn hãy thử tải ứng dụng này về trên thiết bị di động của các bạn để trải nghiệm ngay nhé!\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nLàm đẹp ảnh chân dung như xóa nếp nhăn, làm mịn,... giúp bạn có 1 khuôn mặt hoàn hảo\r\n\r\nNhiều hiệu ứng thú vị, dễ thương khi Selfie\r\n\r\nChỉnh sửa video dễ dàng\r\n\r\nThỏa sức sáng tạo khi có thể tạo ảnh chân dung giống anime dễ thương hoặc các phong cách tùy ý\r\n\r\nLink tải:\r\n\r\nTải Meitu cho Android: ggplay\r\n\r\n​Meitu- App ghép mặt vào ảnh\r\n\r\nMeitu- App ghép mặt vào ảnh\r\n\r\n9. Reface\r\nReFace là một phần mềm ghép mặt vào ảnh và video hiện nay được sử dụng phổ biến với hơn 100 triệu lượt tải về trên toàn thế giới. Ứng dụng này được nhiều dùng phản hồi rất tốt và điều đó giúp nó đạt giải “Ứng dụng thú vị nhất năm 2024” trên nền tảng Google Play.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nCắt ảnh Selfie hoán đổi hoặc gắn vào khuôn mặt khác\r\n\r\nChỉnh sửa, tạo dựng video đơn giản\r\n\r\nGhép mặt vào các siêu anh hùng, các diễn viên cổ trang hoặc bất kỳ ai mà bạn muốn\r\n\r\nChức năng Face Changer giúp thay đổi giới tính, thay đổi mặt của ảnh cực kì vui nhộn\r\n\r\nDễ dàng chia sẻ ảnh, video qua Messenger và mạng xã hội\r\n\r\nCó chức năng tạo ảnh động và lưu dưới dạng ảnh động GIFs hoặc video\r\n\r\nTải Reface:\r\n\r\nggplay appstore\r\n\r\n​Ưu điểm của ứng dụng Reface\r\n\r\nƯu điểm của ứng dụng Reface\r\n\r\n10. Avatarify\r\nAvatarify là một ứng dụng ghép mặt vào ảnh hoàn toàn miễn phí. Ứng dụng này cho phép người dùng hoán đổi khuôn mặt trên ảnh thành khuôn mặt của người khác một cách nhanh chóng.\r\n\r\nƯu điểm nổi trội của phần mềm:\r\nMang lại hiệu ứng chân thực với công nghệ Deepfake\r\n\r\nHoán đổi khuôn mặt trên ảnh với bất kỳ ai bạn muốn\r\n\r\nCắt và ghép khuôn mặt vào ảnh có sẵn\r\n\r\nQuay video điều khiển khuôn mặt của người nổi tiếng theo gương mặt bạn một cách rất dễ dàng\r\n\r\nCó thể tạo ảnh GIFs với khuôn mặt của bạn\r\n\r\nChia sẻ trực tiếp ảnh, video và GIFs đã được chỉnh sửa từ app dễ dàng lên mạng xã hội.\r\n\r\nTải Avatarify:\r\n\r\nggplay appstore\r\n\r\nAvatarify- Phần mềm ghép mặt cực hài hước:\r\n\r\n\r\n\r\n \r\n\r\nTrên đây là tổng hợp những thông tin về app ghép mặt vào ảnh mà Nhanh.vn muốn giới thiệu cho các bạn. Hy vọng chúng sẽ giúp bạn lựa chọn được phần mềm ghép mặt vào ảnh phù hợp với bản thân để có những bức ảnh tuyệt vời của mình với gia đình. Nếu bạn còn thắc mắc gì hãy liên hệ ngay với chúng tôi để được tư vấn miễn phí! Tiếp tục theo dõi Nhanh.vn để tìm hiểu thêm những phần mềm hữu ích.\r\n\r\n                                ', 6, '2025-01-08 21:51:47', '2025-01-08 21:51:47'),
(36, 'Tổng hợp các công thức tính phần trăm (%) tăng giảm giá sản phẩm', 'uploads/news677e9469e97a8cong-thuc-tinh-phan-tram-1.png', 't-ng-h-p-c-c-c-ng-th-c-t-nh-ph-n-tr-m-t-ng-gi-m-gi-s-n-ph-m', ' Khi đi mua sắm, ai cũng mong muốn tìm được những sản phẩm ưng ý với giá cả hợp lý. Để so sánh giá cả và tiết kiệm chi tiêu, chúng ta cần biết cách tính phần trăm giảm giá. Vậy làm thế nào để tính nhanh và chính xác phần trăm giảm giá của một sản phẩm? Hãy cùng Nhanh.vn tìm hiểu ngay nhé!                               ', 'Khi đi mua sắm, ai cũng mong muốn tìm được những sản phẩm ưng ý với giá cả hợp lý. Để so sánh giá cả và tiết kiệm chi tiêu, chúng ta cần biết cách tính phần trăm giảm giá. Vậy làm thế nào để tính nhanh và chính xác phần trăm giảm giá của một sản phẩm? Hãy cùng Nhanh.vn tìm hiểu ngay nhé!\r\n\r\n20230201_1cflxgJxgkZFaWDY.jpg\r\n\r\nNội dung chính\r\n\r\n1. Cách tính phần trăm giảm giá nhanh nhất\r\nCách tính phần trăm giảm giá	Ví dụ\r\nSố % giảm giá = (Giá gốc - Giá sau khi giảm) / Giá gốc * 100	Giá gốc là 500,000 VNĐ, giá sau khi giảm là 400,000 VNĐ.\r\nSố % giảm giá = (500,000 - 400,000) / 500,000 * 100 = 20%\r\nSố tiền sau khi giảm giá = Giá gốc * (1 - Số % giảm giá / 100)	Giá gốc là 500,000 VNĐ, giảm giá 20% \r\nSố tiền sau khi giảm giá = 500,000 * (1 - 20 / 100) = 400,000 VNĐ\r\nSố tiền đã giảm giá = Giá gốc * Số % giảm giá / 100	Giá gốc là 500,000 VNĐ, giảm giá 20% \r\nSố tiền đã giảm giá = 500,000 * 20 / 100 = 100,000 VNĐ\r\n1.1 Cách tính phần trăm giảm giá\r\nBạn muốn biết một món hàng mình mua được giảm giá bao nhiêu phần trăm thì bạn lấy giá gốc trừ đi giá sau khi giảm, rồi chia cho giá gốc và nhân với 100.\r\n\r\nSố % giảm giá = (Giá gốc - Giá sau khi giảm)/Giá gốc x 100\r\n\r\nVí dụ, một chiếc quần ban đầu giá gốc 500.000 đồng, giờ chỉ còn 400.000 đồng. \r\n\r\nVậy phần trăm giảm giá là: (500.000 - 400.000) / 500.000 x 100 = 20%\r\n\r\nCách tính phần trăm giảm giá\r\n\r\n1.2 Cách tính số tiền sau khi giảm giá và số tiền giảm giá\r\nSố tiền sau khi giảm giá = Giá gốc x (100 –  %giảm-giá)/100\r\n\r\nVí dụ, khi bạn đi mua hàng, giá gốc của mặt hàng là 570.000 đồng và bạn được giảm giá 20%. \r\n\r\nVậy cách nhanh nhất để tính số tiền mà bạn phải trả đó là:\r\n\r\nÁp dụng vào ví dụ thì số tiền sau khi giảm giá là: 570.000 x (100 - 20) /100 = 456.000 đồng\r\n\r\nVà số tiền đã giảm giá: Giá-gốc x 20 /100 <=> 570.000 x 20 /1000 = 114.000 đồng\r\n\r\nBạn cũng có thể sử dụng công cụ tính phần trăm giảm giá online nhanh chóng dưới đây\r\n\r\nhttps://miniwebtool.com/vi/percent-off-calculator/ \r\n\r\nỞ trên chúng tôi đã hướng dẫn bạn cách tính phần trăm giá tiền được giảm hãy cùng chúng tôi tìm hiểu thêm về một số công thức tính liên quan nữa dưới đây nhé!\r\n\r\n2. Tính phần trăm tăng giá nhanh nhất\r\nSố tiền sau khi tăng giá= Giá-gốc x [(100 + %tăng-giá)/100]\r\n\r\nNếu như bạn muốn tính phần trăm tăng giá thì bạn hãy cộng thêm số % tăng giá đó với 100%. Ví dụ như sau:\r\n\r\nMặt hàng giá là 570.000 VNĐ. Bây giờ giá của sản phẩm này tăng thêm 20% thì công thức tính nhanh sẽ là:\r\n\r\n100% + 20% = 120%.\r\n\r\nVậy, giá tiền mà bạn cần thanh toán là: 570.000 x 120% = 570.000 x 1.2 = 684.000 VNĐ.\r\n\r\ncách tính phần trăm tăng giá sản phẩm\r\n\r\nQuản lý bán hàng đơn giản dễ dàng với Nhanh.vn - Tiện lợi hơn chỉ với 7k/ngày\r\n\r\nđăng ký ngay\r\n\r\nĐọc thêm: Hướng dẫn chi tiết từ A đến Z cách tạo mã vạch cho sản phẩm\r\n\r\n3. Cách tính giá gốc của sản phẩm sau khi đã được giảm giá\r\nVí dụ, bạn mua một sản phẩm trong dịp khuyến mại giảm giá chẳng hạn. Một mặt hàng được bán với giá 10 triệu VND, và họ ghi là đã giảm 20% so với giá gốc rồi.\r\n\r\nVậy một câu hỏi đặt ra là làm thế nào để có thể tính được giá trị gốc của sản phẩm này đây?\r\n\r\nBạn làm như sau:\r\n\r\nVì sản phẩm đã được giảm 20% rồi => thì bạn lấy 100% – 20%= 80%\r\n\r\nBây giờ chúng ta sẽ sử dụng công thức sau: Giá trị gốc = Giá sau khi giảm / Phần trăm còn lại sau khi đã chiết khấu\r\n\r\nÁp dụng vào ví dụ ta tính được: Giá trị gốc của sản phẩm = 10.000.000 / 80% = 10.000.000/0,08 = 12.500.000 VNĐ.\r\n\r\nXem thêm: Tìm hiểu phương pháp tính giá thành sản phẩm theo định mức\r\n\r\n4. Một số công thức tính phần trăm khác\r\nNhân tiện đây, Nhanh.vn sẽ liệt kê thêm một vài công thức để tính % cho một số trường hợp khác nữa liên quan đến công việc thống kê để bạn nắm vững hơn. Ví dụ như tính phần trăm chênh lệch giữa giữa 2 năm, sản phẩm tăng bao nhiêu % so với ngày hôm trước, % lãi suất ngân hàng, phần trăm lợi nhuận,…\r\n\r\n4.1 Công thức tính % tăng trưởng của năm sau so với năm trước\r\nNăm 2018, công ty A có doanh thu là 100 tỷ đồng.\r\n\r\nNăm 2019, công ty A này đã có doanh thu là 140 tỷ đồng.\r\n\r\nVậy % tăng trưởng doanh thu năm 2019 của công ty A là bao nhiêu %?\r\n\r\nCông thức trợ giúp cách tính % tăng trưởng sau đây:\r\n%(Tăng trưởng, lợi nhuận,…) = (Năm sau – Năm trước)/Năm trước * 100\r\n\r\n=> Phần trăm tăng trưởng năm 2019 của công ty A là: [(140 – 100)/100] * 100 = 40 %\r\n\r\nTìm hiểu ví dụ khác:\r\n\r\nNgày 22/5/2019 cửa hàng bạn bán chiếc bút bi với giá là 3.000 VNĐ\r\n\r\nNhưng, ngày 23/5/2019 cũng chiếc bút bi đó, cửa hàng bạn bán với giá 5.000 VNĐ.\r\n\r\nVậy câu hỏi đặt ra là sản phẩm đó (chiếc bút bi) đã tăng bao nhiêu phần trăm (%) so với ngày hôm trước?\r\n\r\nCách tính nhanh chóng:\r\n\r\nCông thức:\r\n\r\n[(Giá-ngày-hôm-sau – Giá-ngày-hôm-trước) / Giá ngày hôm trước ] x 100\r\n\r\n=> Tỷ lệ % tăng giá của ngày 23 so với ngày 22 là: [(5.000 – 3.000) / 3.000] * 100  = 66,67 %\r\n\r\nMột số công thức tính phần trăm khác\r\n\r\nMột số công thức tính phần trăm khác\r\n\r\n4.2 Tính phần trăm (%) lãi suất ngân hàng\r\nGiá sử cụ thể như thế này, ví dụ bạn gửi 500.000.000 VNĐ vào ngân hàng Vietinbank, bạn muốn tính lãi suất sau một năm bạn gửi ngân hàng là bao nhiêu bạn tính như sau:\r\n\r\nÀ quên, gửi ngân hàng thì lại có gửi (không kỳ hạn, gửi  1 tháng,... đến gửi 1 năm ) nên lãi suất % sẽ khác nhau nhé. Ví dụ như với 500.000.000 bạn gửi với kỳ hạn 36 tháng thì lãi suất sẽ nhận được là 7%.\r\n\r\nCông thức tính lãi suất ngân hàng cố định ngày nay\r\n\r\nTiền lãi = Số-tiền-gửi x Lãi-suất( % năm) x (Số-ngày-gửi/365)\r\n\r\nHoặc\r\n\r\nTiền lãi = Số-tiền-gửi x [Lãi-suất(% năm)/12] x Số-tháng-gửi\r\n\r\nÁp dụng vào ví dụ trên ta có:\r\n\r\nCông thức 1: Tiền lãi = 500.000.000 * 7/100 * (1095/365) = 105.000.000 VNĐ\r\n\r\nCông thức 2: Tiền lãi = 500.000.000 * (7/100/12) x 36 = 105.000.000 VNĐ\r\n\r\nCông thức tính lãi suất hàng tháng đáp ứng nhu cầu tính lãi hàng hóa cơ bản\r\n\r\nSố-tiền-lãi-hàng-tháng = Số-tiền-gửi x Lãi-suất(%năm)/12\r\n\r\nÁp dụng vào ví dụ bên trên ta sẽ tính được số tiền hàng tháng bạn có được từ 500.000.000 là:\r\n\r\n500.000.000 * (7/100/12) = 2.916.666 VNĐ\r\n\r\nTổng kết: Dựa trên là những công thức tính % tăng giảm giá sản phẩm nhanh nhất mà Nhanh.vn đã tổng hợp. Ngoài ra, Nhanh.vn muốn giới thiệu đến bạn một trong những cách thức quản lý doanh nghiệp hiệu quả và được tin dùng nhất hiện nay giúp công việc quản lý hoạt động kinh doanh chưa bao giờ dễ dàng hơn thế. Đó là việc sử dụng các phương pháp chiến lược; phần mềm, dịch vụ quản lý bán hàng giúp làm việc trong chớp nhoáng. Hiện tại, Nhanh.vn đang cung cấp những dịch vụ mới nhất về quản lý doanh nghiệp như quản lý bán hàng, quản lý website, cổng vận chuyển, thu hộ, bán hàng trên các trang thương mại điện tử,... \r\n\r\nNhanh.vn luôn đi đầu trong lĩnh vực đưa tới khách hàng của mình các giải pháp kinh doanh tối ưu và hiệu quả. Với nhiều năm kinh nghiệm cùng những thành tích đạt được, Nhanh.vn luôn mong muốn thay đổi, khám phá và đưa ra những chương trình, giải pháp cần thiết nhất, đảm bảo nhất cho toàn bộ khách hàng. Đang trên đà cổ phiếu tăng nhanh, đây cũng là ý nghĩa mà Nhanh.vn cùng số lượng đội ngũ nhân viên hướng tới trong gần 10 năm phát triển. \r\n\r\nKhông chỉ phần mềm quản lý bán hàng mà những dịch vụ tích hợp của Nhanh.vn cũng đem đến cho bạn có thêm nhiều sự lựa chọn hơn để có thể khắc phục được những vấn đề đang gặp phải trong kinh doanh. Ứng dụng công nghệ quản lý bán hàng 4.0 giúp bạn tăng tốc trở thành chuỗi bán lẻ hàng đầu. Với mô hình bán hàng đa kênh tiếp thị đa điểm, quản lý tập trung giúp việc kinh doanh của bạn thuận lợi và dễ dàng hơn nhiều. Hiện nay đã có hơn 80.000 doanh nghiệp và chủ shop tin tưởng sử dụng các dịch vụ của Nhanh.vn.\r\n\r\nCuối cùng, Nhanh.vn hi vọng bài viết đã giải đáp hoàn toàn được thắc mắc của bạn. Nếu cần hỗ trợ hoặc tư vấn hãy liên hệ ngay cho chúng tôi theo số điện thoại thứ nhất 1900.2812. Chúc các bạn thành công, thành đạt, giỏi giang hơn hoàn thành nhiều tiêu hơn trong cuộc sống sắp tới!                                ', 5, '2025-01-08 22:06:17', '2025-01-08 22:06:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newscategories`
--

CREATE TABLE `newscategories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` enum('Active','Innactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `newscategories`
--

INSERT INTO `newscategories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Kiến thức kinh doanh', 'kien-thuc-kinh-doanh', 'Active', NULL, NULL),
(6, 'Mẹo hay - Thủ thuật', 'meo-hay-thu-thuat', 'Active', NULL, NULL),
(7, 'Bán hàng trên facebook', 'ban-hang-tren-facebook', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('Processing','Confirmed','Shipping','Delivered','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` tinyint NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` tinyint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `disscounted_price` double NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `sumary`, `stock`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'iPhone 12 Pro Max', 'iphone-12-pro-max', 'Cứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 12 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.\r\n\r\nNăm 2023, Apple vừa cho ra mắt series iPhone 15 với nhiều nâng cấp từ các thế hệ iPhone 12, 13, 14 trước đó. Vì vậy nếu bạn đang tìm một phiên bản mới nhất của dòng điện thoại Apple, tham khảo ngay giá iPhone 15 Pro Max tại CellphoneS cùng nhiều ưu đãi hấp dẫn. Đặc biệt iPhone 15 Pro Max còn được trợ giá lên đời tối đa 4 triệu đồng. Xem ngay!\r\n\r\nMàn hình 6.7 inches Super Retina XDR\r\nNăm nay, công nghệ màn hình trên 12 Pro Max cũng được đổi mới và trang bị tốt hơn cùng kích thước lên đến 6.7 inch, lớn hơn so với điện thoại iPhone 12 thường. Với công nghệ màn hình OLED cho khả năng hiển thị hình ảnh lên đến 2778 x 1284 pixels. Bên cạnh đó, màn hình này còn cho độ sáng tối đa cao nhất lên đến 800 nits, luôn đảm bảo cho bạn một độ sáng cao và dễ nhìn nhất ngoài nắng.                                                                ', 'Đặc điểm nổi bật của iPhone 12 Pro Max 128GB I Chính hãng VN/A\r\nMạnh mẽ, siêu nhanh với chip A14, RAM 6GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp ảnh siêu đỉnh - Night Mode , thuật toán Deep Fusion, Smart HDR 3, camera LiDar\r\nBền bỉ vượt trội - Kháng nước, kháng bụi IP68, mặt lưng Ceramic Shield                                                                ', 32, 15300000, 11890000, 'uploads/677896172128fIP12prm.png', 2, 13, 'Active', NULL, NULL),
(8, 'Tương ớt Chin Su chai 1kg', 't-ng-t-chin-su-chai-1kg', '                        Tương ớt Chin Su 1kg\r\n\r\n\r\nTương ớt Chinsu là một trong những loại tương ớt quốc dân, được sử dụng rất phổ biến. Tương ớt Chinsu làm từ ớt đỏ chín cây với hương thơm nồng của tỏi cùng sự biến tấu tinh tế của các loại gia vị, rất ngon khi dùng để chấm với các món chiên, nướng hoặc dùng để tẩm ướp thực phẩm.\r\n\r\n\r\n\r\nThành phần và công dụng:\r\n\r\nTương ớt Chin-su được làm bằng ớt tươi chọn lọc cùng các chất phụ gia, cho màu sắc đẹp mắt, chất lượng hoàn hảo.\r\n\r\nSản phẩm dùng chấm trực tiếp hoặc tẩm ướp thức ăn, giúp tăng thêm hương vị cho món ăn, kích thích bạn ăn ngon miệng hơn.\r\n\r\nMàu đỏ tự nhiên mịn màng, mùi thơm dịu độc đáo và hương vị cay ngon vô cùng hấp dẫn,tuyệt đối không sử dụng vị cay nhân tạo.\r\n\r\nĐạt tiêu chuẩn vệ sinh an toàn thực phẩm\r\n\r\n\r\n\r\nHướng dẫn sử dụng:\r\n\r\nBật nắp nhỏ, cắt nhẹ phần chóp là dùng được ngay.\r\n\r\nDùng với khô mực nướng, hải sản luộc, hải sản tẩm bột chiên, chả giò, gà rán, khoai tây chiên, mì, hamberger, phở,..\r\n\r\nBảo quản:\r\n\r\nĐậy kín nắp sau khi sử dụng.\r\n\r\nĐể nơi thoáng mát. Tránh ánh nắng trực tiếp.        ', 'Xuất Xứ: Vietnam\r\nThành Phần: Đang cập nhật\r\nHướng Dẫn Sử Dụng:\r\nBật nắp nhỏ, cắt nhẹ phần chóp là dùng được ngay. Dùng với khô mực nướng, hải sản luộc, hải sản tẩm bột chiên, chả giò, gà rán, khoai tây chiên, mì, hamberger, phở,..\r\nBảo Quản\r\nĐậy kín nắp sau khi sử dụng. Để nơi thoáng mát. Tránh ánh nắng trực tiếp.                                ', 56, 55600, 52200, 'uploads/677a91b5ac5a9tuong-ot-chinsu.jpg', 15, 13, 'Active', NULL, NULL),
(9, 'Lõi rùa bắp bò Tây Ban Nha MEAT DELI khay 500g', 'l-i-r-a-b-p-b-t-y-ban-nha-meat-deli-khay-500g', 'Lõi rùa bắp bò Tây Ban Nha ACE Foods 500g\r\n\r\nLõi bắp rùa bò Tây Ban Nha là phần thịt bên trong của bắp bò, nơi tập trung nhiều gân nhất. Những đường gân đan xen, chạy dọc trên lõi thịt này có hình dạng giống như các vân trên mai rùa nên được gọi là lõi bắp rùa bò.\r\n\r\nPhần thịt này có số lượng ít, thịt rất giòn, không dai. Khi thưởng thức sẽ cảm nhận được độ dẻo từ những lớp gần, rất ngọt thit, phù hợp với các món như lẩu, xào, hầm, luộc hoặc nấu mì, nấu phở.\r\n\r\nLõi bắp rùa bò Tây Ban Nha từ nhà máy Montellos – một trong ba nhà máy trực thuộc công ty Medina (cùng với Madrid, Valencia). Nhà máy Motellos nằm tại vùng có chất lượng thịt bò ngon nhất ở Tây Ban Nha và được coi là một trong những lò giết mổ tốt nhất của Châu Âu, với sản lượng 5000 con/ tuần\r\n\r\nCơ sở 6000 m2 với dây chuyền giết mổ tối đa 50 con/ giờ; nhà máy cắt công suất 75 tấn/ ngày; Tủ lạnh dung tích lên đến 5000 m3 để bảo quản tươi và đông lạnh.\r\n\r\nGiống bò Tây Ban Nha được nuôi 50% ngũ cốc kết hợp 50% cỏ non nên thịt mềm và thơm hơn so với những con bò nuôi hàn toàn bằng cỏ.\r\n\r\nLÕI BẮP RÙA BÒ TÂY BAN NHA TẠO NÊN NÉT ĐỘC ĐÁO TRONG ẨM THỰC VIỆT\r\n\r\nPhần thịt đặc trưng của con bò – lõi rùa bò Tây Ban Nha có độ giòn sần sật, chất thịt đậm đà mang đến cho người thưởng thức những món ăn không thế nào cưỡng lại từ nhúng lẩu, luộc, xào hay chỉ đơn giản là nấu mì, nấu phở,… Những thớ gân đan xen thịt nạc tạo điểm nhấn và độ giòn dẻo khi thưởng thức, phần thịt này như tan chảy khi chạm vào đầu lưỡi\r\n\r\nNgoài ra, nếu để nguyên khối lõi rùa bò Tây Ban Nha cũng có thể chế biến được thành nhiều món ngon khó cưỡng như: bò hầm sốt vang, lõi bắp rùa bò muối chua hoặc ngâm mắm,…\r\n\r\nTại ACE FOODS+, lõi rùa bò Tây Ban Nha được cắt bằng máy tự động nên độ dày rất đều nhau từ 1-1.5mm hoặc để nguyên khối rất tiện lợi để chế biến thành những món ăn đa dạng và phong phú chiêu đãi cả gia đình.                    ', 'Lõi rùa bắp bò Tây Ban Nha ACE Foods 500g Lõi bắp rùa bò Tây Ban Nha là phần thịt bên trong của bắp bò, nơi tập trung nhiều gân nhất. Những đường gân đan xen, chạy dọc trên lõi thịt này có hình dạng giống như các vân trên mai rùa nên được gọi là lõi bắp rùa bò', 99, 223600, 210000, 'uploads/677a943f0ad3fLoiruabapboTayBanNhaACEFOODSkhay500g.jpg', 9, 16, 'Active', NULL, NULL),
(10, 'Nấm hỗn hợp 300g', 'n-m-h-n-h-p-300g', 'Nấm hỗn hợp 300g\r\n\r\n\r\nHỗn hợp nấm tươi có thành phần 100% là các loại nấm tươi, mỗi khay đóng 300gam bao gồm các loại nấm tươi như nấm Bào ngư hoặc nấm Nâu tây, nấm Hào hương hoặc nấm Yến, nấm Hương tươi hoặc nấm Ngô hoặc nấm Mỡ, Mộc nhĩ tươi. Tùy thuộc vào từng thời điểm, từng mùa vụ mà Hỗn hợp nấm tươi sẽ được đóng các loại nấm phù hợp.\r\n\r\n\r\n\r\nHỗn hợp nấm tươi đáp ứng được nhu cầu chế biến nhiều loại nấm trong một món ăn của khách hàng, đồng thời giúp món ăn được đa vị, đa màu sắc, trông đẹp mắt khi chế biến xong. Hỗn hợp nấm tươi có thể thay thế được rau xanh trong các bữa ăn của mỗi gia đình bởi nấm chính là rau sạch, thịt sạch, rất tốt cho sức khỏe.\r\n\r\n\r\n\r\nHỗn hợp nấm tươi giúp khách hàng chế biến được nhiều món ngon như xào hỗn hợp nấm với thịt bò, thịt gà hoặc xào không, hoặc dùng để nấu canh xương, để làm nem, chả nấm…                                ', 'Hỗn hợp nấm tươi có thành phần 100% là các loại nấm tươi, mỗi khay đóng 300gam bao gồm các loại nấm tươi như nấm Bào ngư hoặc nấm Nâu tây, nấm Hào hương hoặc nấm Yến, nấm Hương tươi hoặc nấm Ngô hoặc nấm Mỡ, Mộc nhĩ tươi. Tùy thuộc vào từng thời điểm, từng mùa vụ mà Hỗn hợp nấm tươi sẽ được đóng các loại nấm phù hợp.\r\n  ', 45, 45200, 42000, 'uploads/677a9f6c81ec7nam-hon-hop.jpg', 11, 17, 'Active', NULL, NULL),
(11, 'Cà tím dài', 'c-t-m-d-i', 'Cà tím dài\r\n\r\n\r\nCà tím là một loài cây thuộc họ Cà với quả cùng tên gọi, nói chung được sử dụng làm một loại rau trong ẩm thực. Cà tím là loại quả nhiều cùi thịt, thuôn dài có màu tím đậm. Cà tím dài thích hợp để chế biến thành các món canh, xào, hay súp.\r\n\r\nCà tím là loại rau quả có chứa hàm lượng vitamin E, P cao, protein, canxi, sắt, phốt pho, ma giê,… đặc biệt chứa chất nightshade soda - một chất có tác dụng chống ung thư, ức chế tăng sinh khối u trong bộ máy tiêu hóa.\r\nTheo Đông y, quả cà có vị ngọt, tính hàn, có tác dụng tán huyết, tiêu viêm, chỉ thống, nhuận tràng, lợi tiểu, trị thũng thấp độc, trừ hòn cục trong bụng, ho lao. Vì vậy, nên kiêng dùng đối với người hư hàn, thận trọng khi phối hợp với các thức ăn hàn, nên ăn kèm các gia vị có tính ôn như: tỏi, ớt, sả…\r\nCà tím dài có khả năng giúp tăng cường sức khỏe cho làn da, răng, và mạch máu, đồng thời hỗ trợ giảm cholesterol, hỗ trợ ngăn ngừa huyết áp cao.\r\nĐặc biệt, đây cũng là một trong những loại rau, củ, quả có khả năng hỗ trợ giảm cân tốt, rất phù hợp trong thực đơn giảm cân.\r\nĐây cũng còn là một trong những thực phẩm hỗ trợ chữa bệnh gout và với hàm lượng canxi cao sẽ giúp cho xương trở nên chắc khoẻ hơn.\r\nLưu ý:\r\n\r\n- Hạn sử dụng thực tế quý khách vui lòng xem trên bao bì.\r\n\r\n- Hình sản phẩm chỉ mang tính chất minh họa, hình thực tế bao bì của sản phẩm tùy thời điểm sẽ khác so với thực tế.', 'Cà tím là một loài cây thuộc họ Cà với quả cùng tên gọi, nói chung được sử dụng làm một loại rau trong ẩm thực. Cà tím là loại quả nhiều cùi thịt, thuôn dài có màu tím đậm. Cà tím dài thích hợp để chế biến thành các món canh, xào, hay súp                            ', 16, 22000, 19900, 'uploads/677b3ce2d869fca-tim-dai.jpg', 11, 17, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newscategories`
--
ALTER TABLE `newscategories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `newscategories`
--
ALTER TABLE `newscategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
