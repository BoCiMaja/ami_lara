@extends('layouts.app')

@section('content')
    <div class="container my-2 my-lg-5">
        <table class="table-responsive mx-auto">
            <thead>
            <tr>
                <th colspan="2" class="h3">{{ $article->name }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" class="text-end p-1">Registered at:</th>
                <td class="p-1">{{ $article->created_at }}</td>
            </tr>
            @php
            $authors=$article->users;
            $contains = false;
            foreach ($authors as $author) {
                if ($author->id === Auth::user()->id) {
                    $contains = true;
                    break;
                }
            }
            @endphp
            @if(\App\Utils\Bouncer::can('edit', $article) || $contains)
                <tr>
                    <td>
                        <x-button.magic class="btn-warning"
                                        :route="route('articles.edit', [$article])">
                            Edit
                        </x-button.magic>
                    </td>
                    <td>
                        <x-button.magic class="btn-danger" :route="route('articles.destroy', [$article])"
                                        confirm="Are you sure? This can not be undone!">Delete
                        </x-button.magic>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
