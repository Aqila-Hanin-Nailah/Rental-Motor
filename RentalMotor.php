<?php
class RentalMotor
{
    private $nama;
    private $lama_rental;
    private $jenis_motor;
    private $harga_per_hari = 70000;
    private $pajak = 10000;
    private $member = ['Cici', 'Nailah', 'Hanin', 'Aqila', 'Hashfi'];

    public function __construct($nama, $lama_rental, $jenis_motor)
    {
        $this->nama = $nama;
        $this->lama_rental = $lama_rental;
        $this->jenis_motor = $jenis_motor;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getLamaRental()
    {
        return $this->lama_rental;
    }

    public function getJenisMotor()
    {
        return $this->jenis_motor;
    }

    public function hargaPerHari()
    {
        return $this->harga_per_hari;
    }

    public function isMember()
    {
        return in_array($this->nama, $this->member);
    }

    public function totalPembayaran()
    {
        $total_harga = $this->lama_rental * $this->harga_per_hari;
        if ($this->isMember()) {
            $diskon = 0.05 * $total_harga;
            $total_harga -= $diskon;
        }
        return $total_harga + $this->pajak;
    }
}
?>
