@extends('layouts.admin')

@section('title','Pricing')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Pricing</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Pricing</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div>
                <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary mb-3">Create</a>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="bg-success text-white">
                      <td>Title</td>
                      <td>Price</td>
                      <td>Is Default</td>
                      <td>Image</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                      <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->is_default }}</td>
                        <td><img src="{{ Storage::url( $item->image ) }}" alt="" width="200px"></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              
                            <a href="{{ route('admin.detailpricing',$item->id) }}" class="dropdown-item text-primary">Add Details</a>
                            <a href="{{ route('admin.pricing.edit',$item->id) }}" class="dropdown-item text-warning">Edit</a>
                            <form action="{{ route('admin.pricing.destroy',$item->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="dropdown-item text-danger" >Delete</button>
                            </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4" class="text-center">Data Tidak Ditemukan</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </section>
@endsection