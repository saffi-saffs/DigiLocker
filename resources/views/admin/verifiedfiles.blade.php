<x-admin-layout>
    <!-- ... your layout code ... -->
    <style>
        h1{
            font-size: 40px;
            display: block;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
        }
        div{
         font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif  ;
          font-size: 20px;
        }
    </style>
    <div>
        <h1 style="color: black">Verified Files</h1>
        <table style="border-collapse: collapse; width: 100%; border: 1px solid #ccc;">
            <thead>
                <tr style="background-color: #f0f0f0;">
                    <th style="padding: 10px; border: 1px solid #ccc;">File Name</th>
                    <th style="padding: 10px; border: 1px solid #ccc;">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($verifiedFiles as $file)
                    <tr style="border: 1px solid #ccc;">
                        <td style="padding: 50px; border: 1px solid #ccc;">{{ $file->name }}</td>
                        <td style="padding: 10px; border: 1px solid #ccc;">
                            <img src="{{ url('storage/' . $file->file_path) }}" alt="{{ $file->name }}" height="100">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
