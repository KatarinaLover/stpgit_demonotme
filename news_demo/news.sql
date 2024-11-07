-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2024 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent`) VALUES
(1, 'Thời Sự', 'Thoi-Su', 3),
(2, 'Thế Giới', 'The-Gioi', 1),
(3, 'Thể Thao', 'The-Thao', 4),
(4, 'Giải Trí', 'Giai-Tri', 5),
(5, 'Pháp Luật', 'Phat-Luat', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `tile` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `conten` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`id`, `tile`, `excerpt`, `conten`, `image`, `category`, `featured`, `views`, `created_at`, `updated_at`, `author`) VALUES
(1, 'Bang Washington kích hoạt Vệ binh Quốc gia đề phòng bạo lực bầu cử', 'Thống đốc bang Washington đã yêu cầu một số thành viên Lực lượng Vệ binh Quốc gia trong trạng thái sẵn sàng đối phó bạo lực liên quan bầu cử.', '\"Dựa trên thông tin chúng tôi có được, cũng như những lo ngại về khả năng xảy ra bạo lực hoặc hành vi bất hợp pháp khác liên quan cuộc bầu cử năm 2024, tôi muốn đảm bảo chúng ta đã chuẩn bị chu toàn để ứng phó\", Thống đốc bang Washington, Jay Inslee, hôm 1/11 cho hay.\r\n\r\nTheo đó, ông quyết định điều động Vệ binh Quốc gia hỗ trợ lực lượng hành pháp và cảnh sát tuần tra của bang khi cần thiết, nhằm dập tắt mọi tình trạng bất ổn liên quan bầu cử.\r\n\r\nThiếu tướng Gent Welsh, người giám sát 8.000 binh sĩ và phi công của Vệ binh Quốc gia bang Washington, sẽ quyết định số lượng thành viên được điều động và trong trạng thái sẵn sàng từ 4/11 đến 7/11, theo văn phòng Thống đốc.\r\n\r\nĐộng thái của Thống đốc Washington diễn ra sau khi Bộ An ninh Nội địa cảnh báo trên toàn quốc về các mối đe dọa đối với cơ sở hạ tầng bầu cử và vụ phóng hỏa thùng phiếu ở thành phố Vancouver của bang này. Theo ông Inslee, hàng trăm phiếu bầu bị hủy hoại trong vụ cháy.\r\n<img src = \"https://i1-vnexpress.vnecdn.net/2024/11/02/ve-binh-quoc-gia-jpeg-3413-1730520429.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=81hxXzP6jxvyQwhM260LAw\">\r\nWashington là bang có truyền thống ủng hộ đảng Dân chủ và Phó tổng thống Kamala Harris được cho là sẽ dễ dàng đánh bại đối thủ đảng Cộng hòa Donald Trump. Theo Phòng nghiên cứu Bầu cử Đại học Florida, hơn hai triệu người ở bang Washington đã đi bỏ phiếu sớm.\r\n\r\nCục Điều tra Liên bang Mỹ (FBI) đang vào cuộc điều tra vụ hai thùng chứa phiếu bầu vắng mặt ở bang Oregon và bang Washington bị phóng hỏa, trong khi giới chức địa phương gọi đây là \"bạo lực chính trị\" và \"tấn công vào nền dân chủ Mỹ\".\r\n\r\nKhi cuộc bầu cử năm nay được dự báo sẽ vô cùng sít sao và căng thẳng, các quan chức bầu cử và nhân viên hòm phiếu Mỹ cho biết họ đang phải có những biện pháp chuẩn bị chưa từng thấy.\r\n\r\nTại hạt Cobb, bang Georgia, nhân viên hòm phiếu được bố trí một nút báo động cùng một đường liên lạc trực tiếp đến văn phòng cảnh sát địa phương. Tại hạt Durham, bang Bắc Carolina, giới chức lắp đặt thêm kính chống đạn cho các điểm bầu cử. Ở thành phố Los Angeles, California, cảnh khuyển được triển khai để kiểm tra phiếu bầu qua thư, đề phòng chúng chứa chất độc.', 've-binh-quoc-gia-jpeg-3413-1730520429.jpg', 5, 0, 231, '2024-11-05 06:46:30', '2024-11-21 06:46:30', 'Huyền Lê (Theo Reuters, Washington State Standard)'),
(2, 'Cựu chủ nhiệm Văn phòng Chính phủ Mai Tiến Dũng bị cáo buộc nhận 200 triệu đồng', 'Ông Mai Tiến Dũng, cựu bộ trưởng, chủ nhiệm Văn phòng Chính phủ, bị cáo buộc giúp đỡ Công ty Sài Gòn Đại Ninh trong dự án ở Lâm Đồng, sau đó nhận cảm ơn 200 triệu đồng.', 'Ông Dũng cùng bị can Trần Bích Ngọc, cựu Vụ trưởng Vụ I Thanh tra Chính phủ; Nguyễn Hồng Giang, cựu Vụ trưởng Vụ II Thanh tra Chính phủ, vừa bị Cơ quan Cảnh sát điều tra Bộ Công an đề nghị truy tố về tội Lợi dụng chức vụ, quyền hạn trong khi thi hành công vụ.\r\n\r\nTrong 6 người bị đề nghị truy tố tội Nhận hối lộ có cựu Bí thư Tỉnh ủy Lâm Đồng Trần Đức Quận và cựu Chủ tịch UBND tỉnh Lâm Đồng Trần Văn Hiệp.\r\n\r\nÔng Nguyễn Cao Trí, Tổng giám đốc Công ty Sài Gòn Đại Ninh bị đề nghị truy tố về tội Đưa hối lộ.\r\n\r\n\r\nTheo kết luận điều tra, năm 2010, Công ty Sài Gòn Đại Ninh được thực hiện dự án Khu đô thị thương mại, du lịch, nghỉ dưỡng sinh thái Đại Ninh tại Lâm Đồng. Thanh tra Chính phủ sau đó xác định đơn vị này trong quá trình thực hiện dự án có nhiều sai phạm nên kiến nghị Thủ tướng giao UBND tỉnh Lâm Đồng chấm dứt hoạt động, thu hồi đất.\r\n\r\nÔng Nguyễn Cao Trí bị cáo buộc nắm bắt động thái này đã móc nối thỏa thuận mua lại dự án Đại Ninh. Để đạt được mục đích là điều chỉnh trái pháp luật quyết định của Nhà nước, ông Trí đã \"dùng tiền, lợi ích vật chất\" để móc nối, câu kết với các cá nhân tại Văn phòng Chính phủ, Thanh tra Chính phủ, Tỉnh ủy và UBND tỉnh Lâm Đồng.\r\n\r\nTừ đó, các cá nhân tại Thanh tra Chính phủ đã thực hiện hành vi trái pháp luật khi ban hành báo cáo mới, hủy bỏ kiến nghị thu hồi dự án Đại Ninh. Nhóm cán bộ tại Lâm Đồng thì đồng ý thay đổi đăng ký kinh doanh, chuyển dự án cho ông Trí rồi đồng thuận không thu hồi dự án, kết luận điều tra nêu.\r\n\r\nSau hàng loạt các sai phạm của các bị can, dự án đã được giãn tiến độ. Ông Trí sau đó bán dự án cho Công ty TNHH Đầu tư và phát triển Bất động sản Thiên Vương, thu lợi 2.700 tỷ đồng. Còn Nhà nước không thu hồi được 3.595 ha đất, lòng hồ của dự án Đại Ninh gây lãng phí tài nguyên đất.\r\n\r\n<img src=\"https://i1-vnexpress.vnecdn.net/2024/11/02/418381067-1412028706373235-639-7944-3211-1730526613.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=130JcGOFUjljit5T7D8ZUA\">\r\n\r\nTheo kết luận, ông Trí sau đó đã đưa hối lộ cho ông Quận 2,1 tỷ đồng, Hiệp 4,2 tỷ đồng.\r\n\r\nVới ông Mai Tiến Dũng, C03 xác định không được phân công phụ trách lĩnh vực thanh tra, giải quyết đơn thư. Tuy nhiên thực hiện ý kiến của lãnh đạo và do có mối quan hệ quen biết với Trí nên ông Dũng đã nhận đơn kiến nghị của Công ty Sài Gòn Đại Ninh.\r\n\r\nÔng Dũng sau đó giao vụ trưởng Trần Bích Ngọc tham mưu, xin ý kiến và truyền đạt ý kiến của Phó thủ tướng Thường trực Chính phủ về việc chuyển đơn và giao Thanh tra Chính phủ kiểm tra, rà soát, giải quyết phản ánh, kiến nghị của Công ty Sài Gòn Đại Ninh. Ông Dũng được Trí cảm ơn 200 triệu đồng.\r\n\r\nÔng Dũng bị tạm giam từ ngày 1/5 đến ngày 17/7, đang được áp dụng biện pháp ngăn chặn bảo lĩnh, tạm hoãn xuất cảnh.', 'Du-ng-4560-1730526613.jpg', 4, 1, 323, '2024-11-11 06:46:30', '2024-11-15 06:46:30', 'Phạm Dự'),
(3, 'Bộ Tài chính: Chưa đến lúc điều chỉnh giảm trừ gia cảnh', 'Cử tri nói giảm trừ gia cảnh chưa phù hợp, song Bộ Tài chính khẳng định vẫn chưa thể điểu chỉnh khi CPI biến động dưới 20% so với lần thay đổi gần nhất.', 'Đoàn đại biểu Quốc hội TP HCM vừa có kiến nghị điều chỉnh giảm trừ gia cảnh phù hợp với tình hình kinh tế xã hội hiện nay. Đề xuất này suốt thời gian qua cũng được các chuyên gia nhắc tới nhiều lần, khi cho rằng cách điều chỉnh giảm trừ gia cảnh hiện nay vẫn chưa hợp lý.\r\n\r\nPhản hồi đề xuất về mức giảm trừ gia cảnh, Bộ Tài chính cho biết, theo Luật thuế thu nhập cá nhân hiện hành, chỉ số giá tiêu dùng (CPI) biến động trên 20% so với thời điểm Luật có hiệu lực hoặc thời điểm điều chỉnh giảm trừ gia cảnh gần nhất thì mới điều chỉnh giảm trừ gia cảnh.\r\n\r\nBộ dẫn số liệu của Tổng cục Thống kê, chỉ số giá tiêu dùng (CPI) năm 2020 tăng 3,23%; năm 2021 tăng 1,84%; năm 2022 tăng 3,15% và CPI năm 2023 tăng 3,25%. Như vậy, CPI biến động chưa đến 20% kể từ thời điểm điều chỉnh mức giảm trừ gia cảnh gần nhất (năm 2020), do đó Bộ Tài chính khẳng định theo quy định của Luật Thuế thu nhập cá nhân hiện hành, chưa thể điều chỉnh mức giảm trừ gia cảnh.\r\n\r\nBộ Tài chính cho biết thuế thu nhập cá nhân điều tiết vào thu nhập của cá nhân. Việc thực hiện chính sách thuế này có vai trò rất quan trọng để triển khai chính sách phân phối lại. Cùng với các nguồn thu khác, nguồn thu từ thuế thu nhập cá nhân đã tạo nên quỹ ngân sách nhà nước để đáp ứng nhiều nhu cầu chi đầu tư phát triển, an ninh quốc phòng, đảm bảo an sinh xã hội, xóa đói giảm nghèo.\r\n\r\nHiện, mức giảm trừ cho bản thân người nộp thuế là 11 triệu đồng và cho mỗi người phụ thuộc 4,4 triệu đồng tháng. Cá nhân được trừ các khoản bảo hiểm, giảm trừ gia cảnh, phụ cấp, trợ cấp... số còn lại mới là thu nhập căn cứ tính thuế thu nhập cá nhân.\r\n\r\nMức giảm trừ gia cảnh cho người nộp thuế và phụ thuộc là mức cụ thể theo mặt bằng chung của xã hội, không phân biệt người có thu nhập cao hay thấp với nhu cầu tiêu dùng khác nhau. Cá nhân có khó khăn do thiên tai, hoả hoạn, tai nạn, bệnh hiểm nghèo thì Luật thuế thu nhập cá nhân đã có quy định giảm thuế.\r\n\r\nBộ Tài chính nhận định, giảm trừ gia cảnh cụ thể cần được nghiên cứu, tính toán kỹ lưỡng, đảm bảo cao hơn GDP bình quân đầu người, tiền lương tối thiểu vùng và chi tiêu bình quân đầu người một giai đoạn nhất định.\r\n\r\nTheo số liệu của Tổng cục thống kê, thu nhập bình quân đầu người mỗi tháng của Việt Nam năm 2023 (theo giá hiện hành) là 4,96 triệu và nhóm hộ thu nhập cao nhất (50% dân số giàu nhất – nhóm 5) có thu nhập bình quân 10,86 triệu đồng mỗi tháng một người.\r\n\r\nMức giảm trừ cho người nộp thuế hiện nay, theo lập luận của Bộ Tài chính là 11 triệu đồng, đang cao hơn 2,2 lần so với thu nhập bình quân đầu người, cao hơn nhiều so với mức phổ biến các nước đang áp dụng từ 0,5 đến 1 lần, đồng thời cũng cao hơn thu nhập bình quân của nhóm 20% dân số thu nhập cao nhất. Mức giảm trừ với người phụ thuộc, theo cơ quan này, cũng gần với thu nhập bình quân đầu người hiện nay.\r\n\r\nBộ Tài chính cho biết đang rà soát, đánh giá tổng thể Luật Thuế thu nhập cá nhân (trong đó có nội dung về mức giảm trừ gia cảnh...) để báo cáo Chính phủ, Ủy ban Thường vụ Quốc hội, Quốc hội xem xét sửa đổi, bổ sung theo chương trình xây dựng luật của Quốc hội, đảm bảo phù hợp với điều kiện kinh tế xã hội của Việt Nam cũng như thông lệ quốc tế.\r\n\r\nDự kiến dự thảo Luật Thuế thu nhập cá nhân sửa đổi sẽ được đăng ký chương trình xây dựng luật vào năm 2025, trình Quốc hội cho ý kiến vào tháng 10/2025 và thông qua vào tháng 5/2026.', '6a5a9015jpg1676598302533116765-6347-9626-1730513834.jpg', 1, 0, 231, '2024-11-20 06:54:35', '2024-11-29 06:54:35', 'Quỳnh Trang'),
(4, 'Hai học sinh lớp ba mất tích khi tắm sông', 'Nghệ An: Em Kha Bảo Trung và Lữ Anh Tuấn, 8 tuổi, ra sông Nậm Mộ ở huyện Tương Dương tắm, sau đó sẩy chân vào vũng nước sâu và mất tích.', 'Chiều 1/11, em Trung và Tuấn, học lớp 3, trường Tiểu học Xá Lượng, huyện Tương Dương, rủ nhau ra sông Nậm Mộ ở trên địa bàn chơi rồi xuống tắm. Vị trí tắm cách bờ khoảng 3-4 m, mực nước sâu hơn nửa mét.\r\nTuy nhiên, do sẩy chân vào vùng nước sâu, hai nam sinh bị nước cuốn mất tích. Tối cùng ngày, không thấy con về, người thân trình báo chính quyền, tổ chức đi tìm và phát hiện quần áo của hai em trên bờ sông Nậm Mộ.\r\n\r\nHơn 100 người gồm công an, bộ đội, quân dân địa phương lập lán trại, đốt lửa tìm kiếm xuyên đêm, đến 10h ngày 2/11 vẫn chưa có kết quả.\r\n\r\nNgười dân đốt lửa bên bờ sông, tìm kiếm <img src=\"https://i1-vnexpress.vnecdn.net/2024/11/02/dot-lua-suoi-am-3806-1730515697.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=964mXo3PGDxc8bEjn4gI2Q\">\r\n\r\nTheo Cục Cảnh sát Phòng cháy chữa cháy và Cứu hộ cứu nạn, số vụ đuối nước trong hai năm 2020-2021 ít hơn cháy nổ, song người tử vong lại nhiều hơn. Cụ thể, trong gần 5.000 sự cố, tai nạn, có hơn 1.600 vụ liên quan đến cháy nổ (33,7%); hơn 1.400 vụ tai nạn dưới nước (29%).', 'mat-tich-khi-tam-song-6331-1730515697.jpg', 3, 1, 312, '2024-11-11 06:54:35', '2024-11-13 06:54:35', 'Đức Hùng\r\n'),
(5, 'Thi thể hai nam sinh trên biển', 'Hà TĩnhEm Đặng Tiến Dũng và Trần Phước Sang, 14 tuổi, được phát hiện tử vong trên vùng biển xã Cương Gián, huyện Nghi Xuân sau hai ngày mất tích.', 'Khoảng 16h ngày 22/10, sau giờ tan học, Dũng và Sang rủ nhau xuống khu du lịch ở xã Xuân Thành, huyện Nghi Xuân tắm biển. Hai em sẩy chân vào vùng nước sâu và bị sóng cuốn mất tích.\r\n\r\nTối cùng ngày, không thấy con về, người thân trình báo chính quyền. Công an, quân đội tổ chức tìm kiếm song bất thành, chỉ phát hiện xe đạp, quần áo cùng hai đôi dép của hai nam sinh bỏ lại trên bờ biển xã Xuân Thành.\r\nĐến sáng 24/10, người dân trong lúc đi thể dục đã phát hiện thi thể Dũng và Sang trôi dạt vào bờ biển thôn Bắc Mới và Đông Tây, xã Cương Gián, cách vị trí gặp nạn ban đầu hơn 10 km.\r\n\r\nDũng và Sang đang học lớp 8 trường THCS Nguyễn Trãi, đóng ở thị trấn Tiên Điền, huyện Nghi Xuân.\r\n\r\n<img src=\"https://i1-vnexpress.vnecdn.net/2024/10/24/day-dep-8726-1729734998.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=0zajZD9GIadkiRVYXQ9MuA\">\r\n\r\nTheo Cục Cảnh sát Phòng cháy chữa cháy và Cứu hộ cứu nạn, số vụ đuối nước trong hai năm 2020-2021 ít hơn cháy nổ, song người tử vong lại nhiều hơn. Cụ thể, trong gần 5.000 sự cố, tai nạn, có hơn 1.600 vụ liên quan đến cháy nổ (33,7%); hơn 1.400 vụ tai nạn dưới nước (29%).', 'vung-bien-cuong-gian-8757-1729734998.jpg', 2, 1, 435, '2024-11-11 07:00:29', '2024-11-21 07:00:29', 'Đức Hùng\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Hoàng Sỹ'),
(2, 'Công Vỹ'),
(3, 'Danh Hi'),
(4, 'Hoàng các'),
(5, 'Vinh Công');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
