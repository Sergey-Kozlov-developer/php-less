const alerts = document.querySelectorAll('.alert')
alerts.forEach((item) => item.addEventListener('click', (e) => {
    const el = e.currentTarget;
    el.classList.add('remove');
    setTimeout(()=>{
        el.remove();
    }, 400)
}));