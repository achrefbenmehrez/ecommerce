@extends('layouts.admin')

@section('content')
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ url('back/plugins/dropzone/min/dropzone.min.css') }}">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin: 20px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modifier le produit {{ $product->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Modifier un produit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Nom</label>
                                    <input type="text" name="name" id="inputName" value="{{ $product->name }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea id="inputDescription" name="description"
                                        class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Prix</label>
                                    <input type="number" name="price" value="{{ $product->price }}" id="inputName"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">En stock</label>
                                    <input type="checkbox" name="stock" value="{{ $product->stock }}" id="inputClientCompany"
                                        class="form-control">
                                </div>
                                <div class="form-group container">
                                    <label for="customFile">Ancienne Photo</label>
                                    <img class="container" height="400px" width="400px" src="{{ asset($product->photoUrl) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Nouvelle Photo</label>
                                    <div class="custom-file">
                                        <input type="file" name="photoUrl" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Annuler</a>
                        <input type="submit" value="Creer" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
