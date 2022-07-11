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
                        <h1>Creer un produit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Creer un produit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                    <input type="text" name="name" id="inputName" value="{{ old('name') }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea id="inputDescription" value="{{ old('description') }}" name="description"
                                        class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Prix</label>
                                    <input type="number" name="price" value="{{ old('price') }}" id="inputName"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">En stock</label>
                                    <input type="checkbox" name="stock" value="{{ old('stock') }}" id="inputClientCompany"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Categorie</label>
                                    <select name="category_id" class="form-control" id="category" style="width: 100%;">
                                        <option selected disabled>--Selectionnez une categorie--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group" id="fields">
                                    <label class="control-label" for="field1">
                                        Photos
                                    </label>
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group">
                                            <input class="form-control" name="photosUrl[]" type="file">
                                            <button class="btn btn-upload btn-success btn-add" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
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
