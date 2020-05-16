<div>

    @if (session()->has('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
    @endif

    @if ($statusUpdate)
    <livewire:contact-update/>
    @else
        <livewire:contact-create/>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">NAMA</th>
                <th scope="col">TELEPON</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0; @endphp
            @foreach($contacts as $contact)
            @php $no++; @endphp
            <tr>
                <th class="text-center" scope="row">{{ $no }}</th>
                <td>{{  $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td class="text-center">
                    <button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-primary">EDIT</button>
                    <button wire:click="destroy({{ $contact->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>