@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')
    {{-- Breadcrumb Section --}}
    <div class="row">
        <div>
            <h6 class="text-uppercase text-end" style="color: #330867; font-size: 14px;">home / {{ $title }}</h6>
        </div>
    </div>

    {{-- Status Toggle Buttons --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.unread.contacts') }}"
                    class="btn {{ route('admin.unread.contacts') ? 'btn-primary' : 'btn-outline-primary' }}">
                    <i class="fas fa-envelope me-1"></i> Unread Messages
                </a>
                <a href="{{ route('admin.read.contacts') }}"
                    class="btn {{ route('admin.read.contacts') ? 'btn-primary' : 'btn-outline-primary' }}">
                    <i class="fas fa-envelope-open me-1"></i> Read Messages
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 gradient-text">
                        <i class="fas fa-address-book me-2"></i>
                        {{ request()->routeIs('admin.unread.contacts') ? 'Unread Contacts' : 'Read Contacts' }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">Id</th>
                                    <th width="20%">Sender Name</th>
                                    <th width="20%">Email</th>
                                    <th width="30%">Subject</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr class="text-center">
                                        <td>{{ $contact->id }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $contact->name }}</div>
                                            <div class="text-muted small">{{ $contact->created_at->format('d M, Y') }}</div>
                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td class="text-start">{{ Str::limit($contact->subject, 40) }}</td>
                                        <td>
                                            @if ($contact->is_read)
                                                <span class="badge bg-light text-success border border-success">Read</span>
                                            @else
                                                <span class="badge bg-danger">New</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- View Button --}}
                                                <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                {{-- Delete Button --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger delete-contact-btn"
                                                    data-bs-toggle="modal" data-bs-target="#deleteContactModal"
                                                    data-id="{{ $contact->id }}" data-name="{{ $contact->name }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6" class="py-4 text-muted">No messages found in this category.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $contacts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete message from: <strong><span id="contactSenderName"></span></strong>?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteContactForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteContactModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const contactId = button.getAttribute('data-id');
                const senderName = button.getAttribute('data-name');

                const modalNameSpan = deleteModal.querySelector('#contactSenderName');
                const form = deleteModal.querySelector('#deleteContactForm');

                modalNameSpan.textContent = senderName;
                form.action = `/admin/contacts/${contactId}`; // আপনার রাউট অনুযায়ী পরিবর্তন করুন
            });
        });
    </script>
@endsection
