create database if not exists LibManagement
	character set utf8
	collate utf8_unicode_ci;
	use LibManagement;
	create table if not exists books (
		bookID char(6) not null primary key,
		name varchar(50) not null,
		publisher varchar(50) not null,
		author varchar(50) not null,
		categoryID char(3) not null,
		numOfPage int not null,
		maxdate int  not null,
		num int not null,
		summary varchar(255) not null,
		picture varchar(255) null

	);

	create table if not exists categories(
		categoryID char(3) not null primary key,
		categoryName varchar(50) not null,
		moreinfo varchar(255) not null
	);
	create table if not exists students(
		cardID char(8) not null primary key,
		name varchar(30) not null,
		address varchar(50) not null,
		tel char(10) not null
	);
	create table if not exists receipts(
		cardID char(8) not null,
		bookID char(6) not null,
		dateBorrow date not null,
		dateReturn date not null,
		returnOK boolean not null
	);
	create table if not exists admin (
		id int(11) not null primary key,
		username varchar(255) not null,
		password varchar(255) not null,
		name varchar(255)  null,
		lavel int(10) null
	);

	alter table books add constraint bookFKcategory foreign key (categoryID) references categories(categoryID);
	alter table receipts add constraint receiptsFkbook foreign key (bookID) references books(bookID);
	alter table receipts  add constraint receiptFkStudent foreign key (cardID) references students(cardID);



	insert into categories(categoryID,categoryName,moreinfo) 
		values('CSD','Cơ sở dữ liệu','Access,Oracle'),
		('ECO','Ecommerce','Sách về thương mại điện tử'),
		('GTT','Giải Thuật','Các bài toán mẫu, các giải thuật,cấu trúc dữ liệu'),
		('HTT','Hệ Thống','Windows,Linux,Unix'),
		('LTT','Ngôn Ngữ Lập Trình','Visual Basic, C, C++, Java'),
		('PTK','Phân Tích Thiết Kế','Phân tích và htieets kế giải thuật hệ thống thông tin v,v..'),
		('VPP','Văn Phòng','Word,Excel'),
		('WEB','Web','Javascript,Vbscipt,HTML,Flash');


		insert into books(bookID,name,publisher,author,categoryID,numOfPage,maxdate,num,summary) 
			values ('CSD001','Cơ sở dữ liệu','NXB Giáo Dục','Đỗ Trung Tấn','CSD','200','3','3','Thiết Kế CSDL'),
			('CSD002','SQL Server 7.0','NXB Đồng Nai','Elicom','CSD','200','3','2','Thiết kế và Sử dụng SQL Server'),
			('CSD003','Oracle 8i','NXB Giáo Dục','Trấn Tiến Dũng','CSD','500','5','3','Từng bước sử dụng Oracle'),
			('HTT001','Windows 2000 professional','NXB Giáo Dục','Anh Thư','HTT','500','3','2','Sử dụng Windows 2000'),
			('HTT002','Windows 2000 Advanse Server','NXB Giáo Dục','ANh Thư','HTT','500','5','2','Sử dụng Windows 200 Server'),
			('LTT001','Lập trnhf Visual Basic 6','NXB Giáo Dục','Nguyễn Tiến','LTT','600','3','3','Kỹ Thuật Lập Trình Visual Basic'),
			('LTT002','Ngôn Ngữ Lập Trình C++','NXB Thống Kê','Tăng Đình Quí','LTT','500','5','3','Lập Trình hướng đối tượng và C++'),
			('LTT003','Lập trình windows bằng visual C++','NXB Giáo Dục','Đặng Văn Đức','LTT','300','4','3','Hướng dẫn từng bước lập trình trên windows'),
			('VPP001','Excel Toàn Tập','NXB Trẻ','Đoàn Công Hùng','VPP','1000','5','4','Trình Bày mọi vấn đề Excel'),
			('VPP002','Word 200 toàn tập','NXB Trẻ','Đoàn Côn Hùng','VPP','1000','4','3','Trình bày mọi vấn đề về Word'),
			('VPP003','Làm Kế Toán Bằng Excel','NXB Thống Kê','Vũ Duy Sanh','VPP','200','5','2','Trình bày phương pháp làm kế toán'),
			('WEB001','Javascript','NXB Trẻ','Lê Minh Trí','WEB','200','5','2','Từng Bước Thiết Kế Web Động'),
			('WEB002','HTML','NXB Giáo Dục','Nguyễn Thị Minh Khoa','WEB','100','3','2','Từng bước làm quen với Web');


			insert into students(cardID,name,address,tel)
				values('STIT001','Vy Văn Việt','92_Quang Trung','0511810583'),
				('STIT002','Nguyễn Khánh','92_Quang Trung','0511810583'),
				('STIT003','Nguyễn Minh Quốc','92_Quang Trung','0511810583'),
				('STIT004','Hồ Phước Thoi','92_Quang Trung','0511810583'),
				('STIT005','Nguyễn Văn Định','92_Quang Trung','0511810583'),
				('STIT006','Nguyễn Văn Hải','92_Quang Trung','0511810583'),
				('STIT007','Nguyễn Thị Thúy Hà','92_Quang Trung','0511810583'),
				('STIT008','Đỗ Thị Thiên Ngân','92_Quang Trung','0511810583'),
				('STIT009','Đỗ Gia Phúc','92_Quang Trung','0098366481'),
				('STIT010','Vũ Yến My','92_Quang Trung','0938247103');

				insert into receipts(cardID,bookID,dateBorrow,dateReturn,returnOK)
					values('STIT001','CSD001','2020-01-09','','0'),
					('STIT001','LTT001','2020-01-08','2020-01-21','1'),
					('STIT002','CSD002','2020-01-07','','0'),
					('STIT002','LTT003','2020-01-10','2020-01-13','1'),
					('STIT003','WEB001','2020-01-01','2020-01-06','1'),
					('STIT004','HTT001','2020-01-05','','0'),
					('STIT004','HTT002','2020-01-10','2020-01-15','1'),
					('STIT006','WEB001','2020-01-07','','0'),
					('STIT006','CSD002','2020-01-01','2020-01-07','1'),
					('STIT006','WEB002','2020-01-15','2020-01-20','1'),
					('STIT007','VPP001','2020-01-13','','0'),
					('STIT007','VPP003','2020-01-03','2020-01-09','1'),
					('STIT008','VPP001','2020-01-13','','0'),
					('STIT009','CSD001','2020-01-02','2020-01-07','1');

