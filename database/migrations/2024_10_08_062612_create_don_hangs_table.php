<?php

use App\Models\DonHang;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan',12);
            $table->string('dia_chi_nguoi_nhan');
            $table->text('ghi_chu')->nullable();
            $table->string('trang_thai')->default(DonHang::CHO_XAC_NHAN);
            $table->string('trang_thai_thanh_toan')->default(DonHang::CHUA_THANH_TOAN);
            $table->double('tien_hang');
            $table->double('tong_tien');
            $table->double('tien_ship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
