<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ensiklopedi;

class EnsiklopediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ! $data = Ensiklopedi::all();
        $data = [
            [
                'id' => 1,
                'judul' => 'Ulos Batak',
                'deskripsi_singkat' => 'Kain tenun khas Batak yang melambangkan ikatan kasih.',
                'gambar_url' => 'https://picsum.photos/seed/ulos/800/600',
            ],
            [
                'id' => 2,
                'judul' => 'Rumah Bolon',
                'deskripsi_singkat' => 'Rumah adat tradisional Batak Toba dengan arsitektur unik.',
                'gambar_url' => 'https://picsum.photos/seed/bolon/800/600'
            ],
            [
                'id' => 3,
                'judul' => 'Tortor',
                'deskripsi_singkat' => 'Tarian seremonial yang dipraktikkan dalam upacara adat.',
                'gambar_url' => 'https://picsum.photos/seed/tortor/800/600'
            ]
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataPalsu = [
            [
                'id' => 1,
                'judul' => 'Ulos Batak',
                'deskripsi_singkat' => 'Kain tenun khas Batak...',
                'gambar_url' => 'https://picsum.photos/seed/ulos/800/600',
                'hotspots' => [
                    [
                        'id' => 'h1',
                        'x' => 20,
                        'y' => 30,
                        'judul' => 'Ikat (Pucuk)',
                        'teks' => 'Bagian ujung ulos yang sering dihiasi rumbai, melambangkan awal dan akhir.'
                    ],
                    [
                        'id' => 'h2',
                        'x' => 50,
                        'y' => 50,
                        'judul' => 'Motif Gorga',
                        'teks' => 'Motif ukiran khas Batak yang sering ditenun ke dalam ulos, memiliki makna spiritual.'
                    ],
                    [
                        'id' => 'h3',
                        'x' => 80,
                        'y' => 70,
                        'judul' => 'Warna Dominan',
                        'teks' => 'Warna seperti merah, hitam, dan putih memiliki makna filosofis tersendiri (Benang Tiga Warna).'
                    ]
                ]
            ],
            [
                'id' => 2,
                'judul' => 'Rumah Bolon',
                'deskripsi_singkat' => 'Rumah adat tradisional Batak Toba...',
                'gambar_url' => 'https://picsum.photos/seed/bolon/800/600'
            ],
            [
                'id' => 3,
                'judul' => 'Tortor',
                'deskripsi_singkat' => 'Tarian seremonial...',
                'gambar_url' => 'https://picsum.photos/seed/tortor/800/600'
            ]
        ];

        $item = null;
        foreach ($dataPalsu as $data) {
            if ($data['id'] == $id) { // Bandingkan ID
                $item = $data;
                break;
            }
        }

        if (!$item) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($item); // Kembalikan satu item

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
