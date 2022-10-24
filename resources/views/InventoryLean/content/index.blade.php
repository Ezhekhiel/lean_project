@extends('InventoryLean.layouts.app_index')

@section('head','navbar','sidebar')

@section('contentheader')

<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Event PT. Parkland World Indoensia</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </section>
            <section class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">nama_material</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Type</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                            <tbody id="table_database">
                            </tbody>
                          </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">location</th>
                                <th scope="col">status</th>
                                <th scope="col">Description</th>
                              </tr>
                            </thead>
                            <tbody id="table_location">
                             
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" id="inventory_id">
                        <button type="button" class="btn btn-primary" onclick="modalAdd()">
                            Alocated
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="alocated_inventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alocated</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="form-location">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">name</th>
                                <th scope="col" style="text-align: center">brand</th>
                                <th scope="col" style="text-align: center">type</th>
                                <th scope="col" style="text-align: center">location</th>
                                <th scope="col" style="text-align: center">status</th>
                                <th scope="col" style="text-align: center">description</th>
                            </tr>
                            </thead>
                            <tbody id="table_modal_alocated">
                            
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
   
@endsection


@section('footer')

