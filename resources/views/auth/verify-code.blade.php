<div style="max-width: 400px; margin: 50px auto; padding: 20px; border-radius: 10px; background-color: #ffffff; text-align: center; font-family: Arial, sans-serif; border: 1px solid #e0e0e0; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
  
  <!-- Header -->
  <h2 style="color: #000000; margin-bottom: 10px;">Verifikasi Email Anda</h2>
  <p style="color: #555; font-size: 14px; margin-bottom: 20px;">
      Masukkan kode verifikasi yang telah kami kirimkan ke <strong style="color: #cc0000;">raviweb@example.com</strong>
  </p>

  <!-- Verification Form -->
  <form method="POST" action="{{ route('verify.code.form') }}" onsubmit="combineCode()" style="display: flex; flex-direction: column; align-items: center;">
      @csrf

      <!-- Hidden input untuk menggabungkan kode -->
      <input type="hidden" name="verification_code" id="verification_code">

      <div style="display: flex; justify-content: center; gap: 5px;">
          <input type="text" maxlength="1" class="code-input" required>
          <input type="text" maxlength="1" class="code-input" required>
          <input type="text" maxlength="1" class="code-input" required>
          <input type="text" maxlength="1" class="code-input" required>
          <input type="text" maxlength="1" class="code-input" required>
          <input type="text" maxlength="1" class="code-input" required>
      </div>

      <!-- Submit Button -->
      <button type="submit" style="margin-top: 20px; width: 100%; background-color: #cc0000; color: #fff; border: none; padding: 12px; font-size: 16px; border-radius: 5px; cursor: pointer;">
          Verifikasi
      </button>
  </form>

</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const inputs = document.querySelectorAll(".code-input");

      inputs.forEach((input, index) => {
          input.style.width = "40px";
          input.style.height = "40px";
          input.style.textAlign = "center";
          input.style.fontSize = "18px";
          input.style.border = "1px solid #ccc";
          input.style.borderRadius = "5px";
          
          input.addEventListener("input", (e) => {
              if (e.target.value.length === 1 && index < inputs.length - 1) {
                  inputs[index + 1].focus();  // Pindah ke input berikutnya
              }
          });

          input.addEventListener("keydown", (e) => {
              if (e.key === "Backspace" && index > 0 && !e.target.value) {
                  inputs[index - 1].focus();  // Kembali ke input sebelumnya saat backspace
              }
          });

          // Event untuk menangani paste kode
          input.addEventListener("paste", (e) => {
              e.preventDefault();
              const pastedData = (e.clipboardData || window.clipboardData).getData("text");
              const pastedNumbers = pastedData.replace(/\D/g, "").split(""); // Hanya angka

              if (pastedNumbers.length === inputs.length) {
                  inputs.forEach((inp, i) => {
                      inp.value = pastedNumbers[i] || "";
                  });
                  inputs[inputs.length - 1].focus();
              }
          });
      });
  });

  function combineCode() {
      let code = "";
      document.querySelectorAll(".code-input").forEach(input => {
          code += input.value;
      });

      document.getElementById("verification_code").value = code;
  }
</script>
