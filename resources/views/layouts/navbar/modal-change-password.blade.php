<div class="modal fade" id="kt_modal_change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header py-3">
                <h5 class="fw-bolder">Ubah Password</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body mx-5 mx-lg-15 my-7">
                <form id="kt_modal_change_password_form">
                    <div class="scroll-y me-n10 pe-10" id="kt_modal_change_password_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_change_password_header"
                        data-kt-scroll-wrappers="#kt_modal_change_password_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 395px;">
                        <div class="row mb-6">
                            <div class="col-lg-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Password Baru</span>
                                </label>
                                <input type="password" class="form-control form-control-solid" name="password" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold text-dark">Konfirmasi Password Baru</span>
                                </label>
                                <input type="password" class="form-control form-control-solid" name="confirm_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button type="reset" id="kt_modal_change_password_cancel"
                            class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="kt_modal_change_password_submit"
                            class="btn btn-sm btn-primary w-lg-200px">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#kt_modal_change_password_form').submit(function(e) {
        e.preventDefault();
        alert('submit');

        const formData = {
            password: $('input[name="password"]').val(),
            password_confirmation: $('input[name="confirm_password"]').val(),
        };

        $.ajax({
            url: "{{route('reset.password')}}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            beforeSend: function() {
                $('#kt_modal_change_password_submit').attr('disabled', true);
                $('#kt_modal_change_password_submit').html(
                    '<span class="indicator-label">Loading...</span>'
                );
            },
            success: function(data) {
                alert("Password berhasil dirubah");
                $('#kt_modal_change_password').modal('hide');
                $('#kt_modal_change_password_submit').attr('disabled', false);
                $('#kt_modal_change_password_submit').html(
                    '<span class="indicator-label">Simpan</span>'
                );
            },
            error: function(xhr, status, error) {
                const data = xhr.responseJSON;
               alert(data.message + 'Opps!');
            }
        });
    });
</script>
