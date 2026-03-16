<main>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Student Listing</p>
                    </div>
                </div>
            </div>

            <div class="row mb-4 bg-gray p-4 rounded">
                <div class="col-md-3">
                    <input type="text" class="form-control bg-dark text-light" placeholder="Search students..." wire:model.live.debounce.300ms="search">
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark text-light" wire:model.live="selectedClass">
                        <option value="" class="text-muted">Select Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark text-light" wire:model.live="selectedSection">
                        <option value="" class="text-muted">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark text-light" wire:model.live="paginate">
                        <option value="5">5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table table-responsive p-4 shadow-sm rounded">
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th style="cursor: pointer" wire:click="sortBy('id')">
                                        ID @if($sortField === 'id') <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i> @endif
                                    </th>
                                    <th style="cursor: pointer" wire:click="sortBy('name')">
                                        Name @if($sortField === 'name') <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i> @endif
                                    </th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th style="cursor: pointer" wire:click="sortBy('created_at')">
                                        Created @if($sortField === 'created_at') <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i> @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone_number }}</td>
                                        <td>{{ $student->class?->name ?? 'N/A' }}</td>
                                        <td>{{ $student->section?->name ?? 'N/A' }}</td>
                                        <td>{{ $student->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">No students found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
