@extends('layouts.app')

@section('content')
<!-- Manage API Section -->
<div class="container py-4" style="margin-bottom: 50px;margin-top: 100px;">
  <h1 class="mb-4">Manage API</h1>
  <span>
  Welcome to our API Management Page! Here, you have complete control over managing your APIs securely and ensuring that they remain hidden from prying eyes. With the card below, you can easily configure and protect your valuable API endpoints.</span>
        <p></p>
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
        <div class="card-body ">
          <div class="d-flex justify-content-start">
            <button type="button" class="btn btn-primary align-items-center mr-2" data-toggle="modal" data-target="#apiKeyModal">
              <i class="fas fa-eye mr-1"></i> <span class="d-none d-sm-inline">View</span>
            </button>
            <button type="button" class="btn btn-secondary align-items-center mr-2" data-toggle="modal" data-target="#regenerateApiKeyModal">
              <i class="fas fa-sync-alt mr-1"></i> <span class="d-none d-sm-inline">Regenerate</span>
            </button>
            <form action="#" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger align-items-center" onclick="return confirm('Are you sure you want to delete your API Key?')">
                <i class="fas fa-trash-alt mr-1"></i> <span class="d-none d-sm-inline">Delete</span>
              </button>
            </form>
          </div>
        </div>
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

