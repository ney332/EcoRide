document.addEventListener('DOMContentLoaded', () => {
    const cpfInput = document.querySelector('input[name="cpf"]');
    const cartaoInput = document.querySelector('input[name="cartao"]');
    const validadeInput = document.querySelector('input[name="validade"]');
    const codigoInput = document.querySelector('input[name="codigo"]');
  
    cpfInput.addEventListener('input', () => {
      let v = cpfInput.value.replace(/\D/g, '').slice(0, 11);
      v = v.replace(/(\d{3})(\d)/, '$1.$2');
      v = v.replace(/(\d{3})(\d)/, '$1.$2');
      v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      cpfInput.value = v;
    });
  
    cartaoInput.addEventListener('input', () => {
      let v = cartaoInput.value.replace(/\D/g, '').slice(0, 16);
      v = v.replace(/(\d{4})(?=\d)/g, '$1 ');
      cartaoInput.value = v;
    });
  
    validadeInput.addEventListener('input', () => {
      let v = validadeInput.value.replace(/\D/g, '').slice(0, 4);
      if (v.length >= 3) {
        v = v.replace(/(\d{2})(\d{1,2})/, '$1/$2');
      }
      validadeInput.value = v;
    });
  
    codigoInput.addEventListener('input', () => {
      codigoInput.value = codigoInput.value.replace(/\D/g, '').slice(0, 3);
    });
  });
  
  const menu = document.getElementById("menu");
  const nav = document.querySelector(".nav");

  menu.addEventListener('click', () => {
  nav.classList.toggle('active');
 });
