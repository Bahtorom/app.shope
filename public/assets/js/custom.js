document.addEventListener('DOMContentLoaded', () => {
    const value1 = document.getElementById('value1');
    const select1 = document.getElementById('select1');
    const value2 = document.getElementById('value2');
    const select2 = document.getElementById('select2');
    const value3 = document.getElementById('value3');
    const select3 = document.getElementById('select3');
    const value4 = document.getElementById('value4');
    const select4 = document.getElementById('select4');
    const value5 = document.getElementById('value5');
    const select5 = document.getElementById('select5');
    const value6 = document.getElementById('value6');
    const select6 = document.getElementById('select6');
    

    const originalTexts1 = {};
   
    if (value1 && select1 && value2 && select2 && value3 && select3 && value4 && select4) {
        // === Функция: обновить тексты в select1 ===
        function updateSelect1Labels(selectedValue = null) {
            Array.from(select1.options).forEach(opt => {
                if (opt.value === selectedValue) {
                    opt.textContent = 'Выбрано';
                } else if (opt.value && originalTexts1[opt.value]) {
                    opt.textContent = originalTexts1[opt.value];
                }
            });
        }
        // === Функция: обновить состояние второго блока (включить/выключить) ===
        function updateSecondBlockState() {
            const isFirstFilled = value1.value.trim() !== '';
            
            // Разблокируем или блокируем ВСЁ, что связано со вторым уровнем
            value2.disabled = !isFirstFilled;
            select2.disabled = !isFirstFilled;

            if (!isFirstFilled) {
                // Если первое поле пустое — сбросим второй блок
                value2.value = '';
                select2.innerHTML = '<option value="">— Сначала заполните первое поле —</option>';
            }
            updateThreeBlockState();
            updateFourBlockState();
        }

        // === Загрузка опций для первого select ===
        fetch('/api/select/level1')
            .then(res => res.json())
            .then(options => {
                options.forEach(opt => {
                    const el = document.createElement('option');
                    el.value = opt;
                    el.textContent = opt;
                    originalTexts1[opt] = opt; 
                    select1.appendChild(el);
                });
            })
            .catch(console.error);

        // === Выбор из первого select → подставляем в input И обновляем состояние ===
        select1.addEventListener('change', function () {
            const selectedValue = this.value;
            value1.value = selectedValue;// даже если пусто — ок
            updateSecondBlockState();
            updateSelect1Labels();
            // ← обновляем блокировку
            if (this.value) {
                triggerLevel2Update(this.value);
            }
        });

        // === Ручной ввод в первый input ===
        let debounceTimer1;
        value1.addEventListener('input', function () {
            updateSecondBlockState(); // ← сразу разблокируем, если что-то ввели

            clearTimeout(debounceTimer1);
            debounceTimer1 = setTimeout(() => {
                triggerLevel2Update(this.value.trim());
                if (!select1.value || !originalTexts1[select1.value]) {
                    select1.value = ''; // сбрасываем выбор
                }
                updateSelect1Labels('');
            }, 300);
        });


        // === Функция обновления второго уровня (селект) ===
        function triggerLevel2Update(query) {
            if (!query) {
                select2.innerHTML = '<option value="">— Введите значение выше —</option>';
                return;
            }

            select2.innerHTML = '<option value="">— Загрузка... —</option>';

            fetch(`/api/select/level2?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(options => {
                    select2.innerHTML = '<option value="">— Выберите —</option>';
                    options.forEach(opt => {
                        const el = document.createElement('option');
                        el.value = opt;
                        el.textContent = opt;
                        select2.appendChild(el);
                    });
                })
                .catch(() => {
                    select2.innerHTML = '<option value="">— Нет данных —</option>';
                });
        }


        // === Функция: обновить состояние третьего блока (включить/выключить) ===
        function updateThreeBlockState() {
            const isSecondFilled = value2.value.trim() !== '';
            
            // Разблокируем или блокируем ВСЁ, что связано со вторым уровнем
            value3.disabled = !isSecondFilled;
            select3.disabled = !isSecondFilled;

            if (!isSecondFilled) {
                // Если первое поле пустое — сбросим второй блок
                value3.value = '';
                select3.innerHTML = '<option value="">— Сначала заполните второе поле —</option>';
            }
            updateFourBlockState();
        }
        // === Выбор из второго select → подставляем в input ===
        select2.addEventListener('change', function () {
            value2.value = this.value || '';
            updateThreeBlockState();  // ← обновляем блокировку
            if (this.value) {
                triggerLevel3Update(this.value);
            }
        });

        // === Ручной ввод в первый input ===
        let debounceTimer2;
        value2.addEventListener('input', function () {
            updateThreeBlockState(); // ← сразу разблокируем, если что-то ввели

            clearTimeout(debounceTimer2);
            debounceTimer2 = setTimeout(() => {
                triggerLevel3Update(this.value.trim());
            }, 300);
        });

        // === Инициализация: проверим начальное состояние (на случай, если value1 уже заполнен) ===
        updateSecondBlockState();
        

    

        // === Функция обновления третьего уровня (селект) ===
        function triggerLevel3Update(query) {
            if (!query) {
                select3.innerHTML = '<option value="">— Введите значение выше —</option>';
                return;
            }

            select3.innerHTML = '<option value="">— Загрузка... —</option>';

            fetch(`/api/select/level3?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(options => {
                    select3.innerHTML = '<option value="">— Выберите —</option>';
                    options.forEach(opt => {
                        const el = document.createElement('option');
                        el.value = opt;
                        el.textContent = opt;
                        select3.appendChild(el);
                    });
                })
                .catch(() => {
                    select3.innerHTML = '<option value="">— Нет данных —</option>';
                });
        }
        

        // === Функция: обновить состояние третьего блока (включить/выключить) ===
        function updateFourBlockState() {
            const isThreeFilled = value3.value.trim() !== '';
            
            // Разблокируем или блокируем ВСЁ, что связано со вторым уровнем
            value4.disabled = !isThreeFilled;
            select4.disabled = !isThreeFilled;

            if (!isThreeFilled) {
                // Если первое поле пустое — сбросим второй блок
                value4.value = '';
                select4.innerHTML = '<option value="">— Сначала заполните третье поле —</option>';
            }
            
        }

        // === Выбор из третьего select → подставляем в input ===
        select3.addEventListener('change', function () {
            value3.value = this.value || '';
            updateFourBlockState();  // ← обновляем блокировку
            if (this.value) {
                triggerLevel4Update(this.value);
            }
        });

        // === Ручной ввод в третий input ===
        let debounceTimer3;
        value3.addEventListener('input', function () {
            updateFourBlockState(); // ← сразу разблокируем, если что-то ввели

            clearTimeout(debounceTimer3);
            debounceTimer3 = setTimeout(() => {
                triggerLevel4Update(this.value.trim());
            }, 300);
        });

        // === Инициализация: проверим начальное состояние (на случай, если value1 уже заполнен) ===
        updateThreeBlockState();



        // === Функция обновления четвертого уровня (селект) ===
        function triggerLevel4Update(query) {
            if (!query) {
                select4.innerHTML = '<option value="">— Введите значение выше —</option>';
                return;
            }

            select4.innerHTML = '<option value="">— Загрузка... —</option>';

            fetch(`/api/select/level4?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(options => {
                    select4.innerHTML = '<option value="">— Выберите —</option>';
                    options.forEach(opt => {
                        const el = document.createElement('option');
                        el.value = opt;
                        el.textContent = opt;
                        select4.appendChild(el);
                    });
                })
                .catch(() => {
                    select4.innerHTML = '<option value="">— Нет данных —</option>';
                });
        }
        
        // === Выбор из третьего select → подставляем в input ===
        select4.addEventListener('change', function () {
            value4.value = this.value || '';
        });

        
        // === Инициализация: проверим начальное состояние (на случай, если value1 уже заполнен) ===
        updateFourBlockState();
    }


    if (value5 && select5) {
        const originalTexts5 = {};
        
        fetch('/api/select/level5')
        .then(res => res.json())
        .then(options => {
            options.forEach(opt => {
                const el = document.createElement('option');
                el.value = opt;
                el.textContent = opt;
                originalTexts5[opt] = opt; 
                select5.appendChild(el);
            });
        })
        .catch(console.error);
        

            // === Функция: обновить тексты в select1 ===
        function updateSelect5Labels(selectedValue = null) {
            Array.from(select5.options).forEach(opt => {
                if (opt.value === selectedValue) {
                    opt.textContent = 'Выбрано';
                } else if (opt.value && originalTexts5[opt.value]) {
                    opt.textContent = originalTexts5[opt.value];
                }
            });
        }

        // === Выбор из первого select → подставляем в input И обновляем состояние ===
        select5.addEventListener('change', function () {
            const selectedValue = this.value;
            value5.value = selectedValue;// даже если пусто — ок
            updateSelect5Labels();
        });

    }


    if (value6 && select6) {
        const originalTexts6 = {};
        
        fetch('/api/select/level6')
        .then(res => res.json())
        .then(options => {
            options.forEach(opt => {
                const el = document.createElement('option');
                el.value = opt;
                el.textContent = opt;
                originalTexts6[opt] = opt; 
                select6.appendChild(el);
            });
        })
        .catch(console.error);
        

            // === Функция: обновить тексты в select1 ===
        function updateSelect6Labels(selectedValue = null) {
            Array.from(select6.options).forEach(opt => {
                if (opt.value === selectedValue) {
                    opt.textContent = 'Выбрано';
                } else if (opt.value && originalTexts6[opt.value]) {
                    opt.textContent = originalTexts6[opt.value];
                }
            });
        }

        // === Выбор из первого select → подставляем в input И обновляем состояние ===
        select6.addEventListener('change', function () {
            const selectedValue = this.value;
            value6.value = selectedValue;// даже если пусто — ок
            updateSelect6Labels();
        });
    }
});




// Admin icon
const lightbulbIcon = document.querySelector(".lightbulb-icon i");
const bulbPopup = document.querySelector(".bulb-popup");

lightbulbIcon?.addEventListener("click", () => {
  bulbPopup.classList.toggle("open");
});


// pencil   trash    eye  eye-closed 


// Edit icon
const pencilIcon = document.querySelector(".pencil-icon i");
const penPopup = document.querySelector(".pencil-popup");

pencilIcon?.addEventListener("click", () => {
  penPopup.classList.toggle("open");
});


// Delete icon
const trashIcon = document.querySelector(".trash-icon i");
const trashPopup = document.querySelector(".trash-popup");

trashIcon?.addEventListener("click", () => {
  trashPopup.classList.toggle("open");
});





document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-cart-btn').forEach(btn => {
        btn.addEventListener('click', async () => {

            if (btn.hasAttribute('disabled')) {
                return;
            }

            const phoneId = btn.getAttribute('data-phone-id');

            // Проверка авторизации
            if (!window.Laravel.isLoggedIn) {
                window.location.href = window.Laravel.loginUrl;
                return;
            }

            try {
                const response = await fetch(window.Laravel.cartAddUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.Laravel.csrfToken
                    },
                    body: JSON.stringify({ phone_id: phoneId })
                });

                if (response.ok) {
                    btn.textContent = 'В корзине';
                    btn.classList.replace('bg-white', 'bg-black');
                    btn.classList.add('text-white');
                    btn.disabled = true;
                } else {
                    const error = await response.json();
                    alert('Ошибка: ' + (error.message || 'Не удалось добавить в корзину'));
                }
            } catch (e) {
                console.error('AJAX error:', e);
                alert('Ошибка подключения');
            }
        });
    });
});



// stock phones
const stockUpdates = {};

function changeStock(button, delta) {
    const wrapper = button.closest('div[data-phone-id]');
    const phoneId = wrapper.dataset.phoneId;

    if (stockUpdates[phoneId]) return;

    const stockElement = wrapper.querySelector('.stock-value');
    let currentValue = parseInt(stockElement.textContent) || 0;
    let newValue = currentValue + delta;

    if (newValue < 0) newValue = 0;

    // Сначала обновляем UI
    stockElement.textContent = newValue;

    stockUpdates[phoneId] = true;
    disableButtons(wrapper, true);

    // Затем — отправляем на сервер
    updateStockOnServer(phoneId, newValue)
        .finally(() => {
            stockUpdates[phoneId] = false;
            disableButtons(wrapper, false);
        });
}

function disableButtons(wrapper, disable) {
    const buttons = wrapper.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.disabled = disable;
        // Опционально: визуальный фидбек
        btn.style.opacity = disable ? '0.6' : '1';
        btn.style.pointerEvents = disable ? 'none' : 'auto';
    });
}


async function updateStockOnServer(phoneId, newStock) {
    try {
        const response = await fetch(`/admin/a_phones/${phoneId}/update-stock`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ stock: newStock })
        });
        const data = await response.json();
        if (data.success) {
            // Обновляем UI ТОЛЬКО если это актуальное значение
            const el = document.querySelector(`div[data-phone-id="${phoneId}"] .stock-value`);
            if (el && parseInt(el.textContent) !== data.stock) {
                el.textContent = data.stock;
            }
        }
        return data;
    } catch(err) {
            console.error('Ошибка сети:', err);
        }
    
}

// end stock phones

//dashboard
document.addEventListener('DOMContentLoaded', () => {
    // === Круговая диаграмма ===
    const categoryCanvas = document.getElementById('categoryChart');
    if (categoryCanvas) {
        const labels = JSON.parse(categoryCanvas.dataset.labels);
        const values = JSON.parse(categoryCanvas.dataset.values);

        new Chart(categoryCanvas.getContext('2d'), {
            type: 'doughnut',
            data: {  // ✅ ДОБАВЛЕНО: data
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['#4856DA', '#D2EF9A', '#8684D4', '#ff7504'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 12 },
                            padding: 16
                        }
                    }
                },
                cutout: '60%'
            }
        });
    }

    // === Линейный график ===
    const salesCanvas = document.getElementById('salesChart');
    if (salesCanvas) {
        const daysInMonth = parseInt(salesCanvas.dataset.days, 10);
        const data = JSON.parse(salesCanvas.dataset.values);
        const labels = Array.from({ length: daysInMonth }, (_, i) => i + 1);

        new Chart(salesCanvas.getContext('2d'), {
            type: 'line',
            data: {  // ✅ ДОБАВЛЕНО: data
                labels: labels,
                datasets: [{
                    label: 'Продажи',
                    data: data,
                    borderColor: '#1F1F1F',
                    backgroundColor: 'rgba(210, 239, 154, 0.3)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                },
                plugins: {
                    legend: { display: true }
                }
            }
        });
    }
});
  //end dashboard