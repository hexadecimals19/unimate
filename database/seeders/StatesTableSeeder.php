<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\District;

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        $statesData = [
            'Johor' => [
                'Batu Pahat', 'Johor Bahru', 'Kluang', 'Kota Tinggi', 'Kulai',
                'Mersing', 'Muar', 'Pontian', 'Segamat', 'Tangkak'
            ],
            'Kedah' => [
                'Baling', 'Bandar Baharu', 'Kota Setar', 'Kuala Muda', 'Kubang Pasu',
                'Kulim', 'Langkawi', 'Padang Terap', 'Pendang', 'Pokok Sena', 'Sik', 'Yan'
            ],
            'Kelantan' => [
                'Bachok', 'Gua Musang', 'Jeli', 'Kota Bharu', 'Kuala Krai',
                'Machang', 'Pasir Mas', 'Pasir Puteh', 'Tanah Merah', 'Tumpat'
            ],
            'Malacca' => [
                'Alor Gajah', 'Jasin', 'Melaka Tengah'
            ],
            'Negeri Sembilan' => [
                'Jempol', 'Jelebu', 'Kuala Pilah', 'Port Dickson', 'Rembau', 'Seremban', 'Tampin'
            ],
            'Pahang' => [
                'Bentong', 'Bera', 'Cameron Highlands', 'Jerantut', 'Kuantan',
                'Lipis', 'Maran', 'Pekan', 'Raub', 'Rompin', 'Temerloh'
            ],
            'Penang' => [
                'Barat Daya (Southwest Penang Island)', 'Timur Laut (Northeast Penang Island)',
                'Seberang Perai Utara (North Seberang Perai)', 'Seberang Perai Tengah (Central Seberang Perai)',
                'Seberang Perai Selatan (South Seberang Perai)'
            ],
            'Perak' => [
                'Batang Padang', 'Hilir Perak', 'Kampar', 'Kerian', 'Kuala Kangsar',
                'Larut, Matang, and Selama', 'Manjung', 'Muallim', 'Perak Tengah', 'Kinta', 'Hulu Perak'
            ],
            'Perlis' => [
                'Kangar', 'Arau', 'Padang Besar'
            ],
            'Sabah' => [
                'Beaufort', 'Beluran', 'Kinabatangan', 'Kota Belud', 'Kota Kinabalu',
                'Kota Marudu', 'Kuala Penyu', 'Kudat', 'Kunak', 'Lahad Datu', 'Nabawan',
                'Papar', 'Penampang', 'Pitas', 'Putatan', 'Ranau', 'Sandakan', 'Semporna',
                'Sipitang', 'Tambunan', 'Tawau', 'Telupid', 'Tenom', 'Tongod'
            ],
            'Sarawak' => [
                'Asajaya', 'Bau', 'Belaga', 'Beluru', 'Betong', 'Bintulu', 'Dalat', 'Daro',
                'Julau', 'Kabong', 'Kanowit', 'Kapit', 'Kuching', 'Lawas', 'Limbang',
                'Lubok Antu', 'Lundu', 'Marudi', 'Matu', 'Miri', 'Mukah', 'Pakan',
                'Pusa', 'Samarahan', 'Saratok', 'Sarikei', 'Sebauh', 'Selangau',
                'Serian', 'Siburan', 'Sibu', 'Simunjan', 'Song', 'Sri Aman', 'Subis',
                'Tanjung Manis', 'Tatau', 'Tebedu'
            ],
            'Selangor' => [
                'Gombak', 'Hulu Langat', 'Hulu Selangor', 'Klang', 'Kuala Langat',
                'Kuala Selangor', 'Petaling', 'Sabak Bernam', 'Sepang'
            ],
            'Terengganu' => [
                'Besut', 'Dungun', 'Hulu Terengganu', 'Kemaman', 'Kuala Nerus',
                'Kuala Terengganu', 'Marang', 'Setiu'
            ],
            'Kuala Lumpur' => [
                'Bukit Bintang', 'Cheras', 'Kepong', 'Lembah Pantai',
                'Seputeh', 'Setiawangsa', 'Titiwangsa', 'Wangsa Maju'
            ],
            'Putrajaya' => [
                'Presint 1', 'Presint 2', 'Presint 3', 'Presint 4', 'Presint 5',
                'Presint 6', 'Presint 7', 'Presint 8', 'Presint 9', 'Presint 10',
                'Presint 11', 'Presint 12', 'Presint 13', 'Presint 14', 'Presint 15',
                'Presint 16', 'Presint 18', 'Presint 19', 'Presint 20'
            ],
            'Labuan' => [
                'Victoria'
            ]
        ];

        foreach ($statesData as $stateName => $districts) {
            $state = State::create(['name' => $stateName]);
            foreach ($districts as $districtName) {
                District::create(['name' => $districtName, 'state_id' => $state->id]);
            }
        }
    }
}


