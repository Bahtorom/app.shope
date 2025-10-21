document.addEventListener('DOMContentLoaded', () => {
    const value1 = document.getElementById('value1');
    const select1 = document.getElementById('select1');
    const value2 = document.getElementById('value2');
    const select2 = document.getElementById('select2');
    const value3 = document.getElementById('value3');
    const select3 = document.getElementById('select3');
    const value4 = document.getElementById('value4');
    const select4 = document.getElementById('select4');

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
                select1.appendChild(el);
            });
        });

    // === Выбор из первого select → подставляем в input И обновляем состояние ===
    select1.addEventListener('change', function () {
        value1.value = this.value; // даже если пусто — ок
        updateSecondBlockState();
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
});