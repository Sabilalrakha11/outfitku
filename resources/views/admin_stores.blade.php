@extends('layout')

@section('content')
<div class="container" style="min-height: 60vh;">

    <div style="text-align: center; margin-bottom: 40px; margin-top: 20px;">
        <h1 style="letter-spacing: 2px;">SUPER ADMIN DASHBOARD</h1>
        <p style="color: #666;">Moderasi Pendaftaran Toko Baru</p>
    </div>

    {{-- Alert kalau sukses approve/reject --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px;">
        <thead>
            <tr style="border-bottom: 2px solid #000; text-align: left;">
                <th style="padding: 15px 10px;">NAMA TOKO</th>
                <th style="padding: 15px 10px;">PEMILIK</th>
                <th style="padding: 15px 10px;">DESKRIPSI</th>
                <th style="padding: 15px 10px;">TANGGAL DAFTAR</th>
                <th style="padding: 15px 10px; text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pending_stores as $store)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 15px 10px; font-weight: bold;">{{ strtoupper($store->nama_toko) }}</td>
                    <td style="padding: 15px 10px;">{{ $store->user->name }}</td>
                    <td style="padding: 15px 10px; max-width: 200px;">{{ $store->deskripsi }}</td>
                    <td style="padding: 15px 10px;">{{ $store->created_at->format('d M Y') }}</td>
                    <td style="padding: 15px 10px; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 10px;">
                            
                            {{-- Tombol Approve --}}
                            <form action="{{ route('admin.stores.approve', $store->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background-color: #0A192F; color: white; border: none; padding: 8px 15px; cursor: pointer; font-weight: bold; border-radius: 3px;">
                                    APPROVE
                                </button>
                            </form>
                            
                            {{-- Tombol Reject --}}
                            <form action="{{ route('admin.stores.reject', $store->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background-color: transparent; color: red; border: 1px solid red; padding: 8px 15px; cursor: pointer; font-weight: bold; border-radius: 3px;">
                                    REJECT
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #888;">
                        🎉 Hore! Belum ada toko baru yang antri minta direview.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection