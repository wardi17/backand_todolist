-- 1. Kategori Produk
CREATE TABLE KategoriProduk (
    KategoriID INT IDENTITY(1,1) PRIMARY KEY,
    NamaKategori NVARCHAR(100) NOT NULL,
    Deskripsi NVARCHAR(255)
);

-- 2. Supplier / Pemasok
CREATE TABLE Supplier (
    SupplierID INT IDENTITY(1,1) PRIMARY KEY,
    NamaSupplier NVARCHAR(150) NOT NULL,
    Alamat NVARCHAR(255),
    Telepon NVARCHAR(20),
    Email NVARCHAR(100),
    created_at datetime NULL,
	updated_at datetime NULL,
);

-- 3. Produk
CREATE TABLE Produk (
    ProdukID INT IDENTITY(1,1) PRIMARY KEY,
    NamaProduk NVARCHAR(150) NOT NULL,
    KategoriID INT NOT NULL,
    SupplierID INT NULL,
    HargaBeli DECIMAL(18,2) NOT NULL,
    HargaJual DECIMAL(18,2) NOT NULL,
    Satuan NVARCHAR(50),
    Status BIT DEFAULT 1, -- 1 = aktif, 0 = tidak aktif
    created_at datetime NULL,
	updated_at datetime NULL,
    CONSTRAINT FK_Produk_Kategori FOREIGN KEY (KategoriID) REFERENCES KategoriProduk(KategoriID),
    CONSTRAINT FK_Produk_Supplier FOREIGN KEY (SupplierID) REFERENCES Supplier(SupplierID)
);

-- 4. Stok Produk
CREATE TABLE StokProduk (
    StokID INT IDENTITY(1,1) PRIMARY KEY,
    ProdukID INT NOT NULL,
    Jumlah INT NOT NULL DEFAULT 0,
    LokasiGudang NVARCHAR(100),
    CONSTRAINT FK_Stok_Produk FOREIGN KEY (ProdukID) REFERENCES Produk(ProdukID)
);

-- 5. Transaksi (Pembelian / Penjualan)
CREATE TABLE Transaksi (
    TransaksiID INT IDENTITY(1,1) PRIMARY KEY,
    Tanggal DATETIME NOT NULL DEFAULT GETDATE(),
    JenisTransaksi NVARCHAR(20) NOT NULL, -- 'Pembelian' atau 'Penjualan'
    Keterangan NVARCHAR(255)
);

-- 6. Detail Transaksi
CREATE TABLE DetailTransaksi (
    DetailID INT IDENTITY(1,1) PRIMARY KEY,
    TransaksiID INT NOT NULL,
    ProdukID INT NOT NULL,
    Jumlah INT NOT NULL,
    Harga DECIMAL(18,2) NOT NULL,
    Subtotal AS (Jumlah * Harga) PERSISTED,
    CONSTRAINT FK_Detail_Transaksi FOREIGN KEY (TransaksiID) REFERENCES Transaksi(TransaksiID),
    CONSTRAINT FK_Detail_Produk FOREIGN KEY (ProdukID) REFERENCES Produk(ProdukID)
);
