@extends('layouts.app')

@section('content')
<!-- Manage API Section -->
<div class="container py-4" style="padding: 0 50px;margin-bottom: 50px;margin-top: 100px;">
  <h1 class="mb-4">Manage API</h1>
  <span>angkotAPI.com Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</span>
        <p class="lead">
        For complete documentation please visit our <a href="#" target="_blank">angkot API Documentation</a> section. 
        </p>
  <div class="row">
    <div class="col-md-4">
      <!-- API Key Info -->
      <div class="card mb-4">
        <div class="card-header">
          API Key
        </div>
        <div class="card-body">
          <p class="card-text">Your API Key is:</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#apiKeyModal">View</button>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#regenerateApiKeyModal">Regenerate</button>
          <form action="#" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your API Key?')">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- View API Key Modal -->
<div class="modal fade" id="apiKeyModal" tabindex="-1" role="dialog" aria-labelledby="apiKeyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="apiKeyModalLabel">API Key</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="card-text">Your API Key is:</p>
        <textarea class="form-control" rows="3" readonly>kode api disini</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Regenerate API Key Modal -->
<div class="modal fade" id="regenerateApiKeyModal" tabindex="-1" role="dialog" aria-labelledby="regenerateApiKeyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regenerateApiKeyModalLabel">Create API Key</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to regenerate your API Key?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="#" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-primary">Regenerate</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

