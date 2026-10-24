const createSvg = (path) => {
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    const line = document.createElementNS('http://www.w3.org/2000/svg', 'path');

    svg.setAttribute('viewBox', '0 0 24 24');
    svg.setAttribute('fill', 'none');
    svg.setAttribute('stroke', 'currentColor');
    svg.setAttribute('stroke-width', '2');
    svg.setAttribute('stroke-linecap', 'round');
    svg.setAttribute('stroke-linejoin', 'round');
    svg.setAttribute('aria-hidden', 'true');
    svg.classList.add('select-chevron');

    line.setAttribute('d', path);
    svg.append(line);

    return svg;
};

const closeAllSelects = () => {
    document.querySelectorAll('.select-trigger[aria-expanded="true"]').forEach((trigger) => {
        trigger.setAttribute('aria-expanded', 'false');
        trigger.nextElementSibling.hidden = true;
    });
};

document.querySelectorAll('[data-select] select').forEach((select) => {
    const wrapper = select.closest('[data-select]');
    const trigger = document.createElement('button');
    const value = document.createElement('span');
    const menu = document.createElement('div');
    const triggerId = select.id + '-trigger';
    const menuId = select.id + '-options';
    const label = document.querySelector('label[for="' + select.id + '"]');

    wrapper.classList.add('has-custom-select');
    select.tabIndex = -1;
    select.setAttribute('aria-hidden', 'true');

    trigger.type = 'button';
    trigger.className = 'select-trigger';
    trigger.id = triggerId;
    trigger.setAttribute('aria-haspopup', 'listbox');
    trigger.setAttribute('aria-expanded', 'false');
    trigger.setAttribute('aria-controls', menuId);
    trigger.setAttribute('aria-label', label?.textContent.trim() || 'Pilih opsi');

    if (select.hasAttribute('aria-invalid')) {
        trigger.setAttribute('aria-invalid', select.getAttribute('aria-invalid'));
    }

    if (select.hasAttribute('aria-describedby')) {
        trigger.setAttribute('aria-describedby', select.getAttribute('aria-describedby'));
    }

    value.className = 'select-value';
    trigger.append(value, createSvg('m7 10 5 5 5-5'));

    menu.className = 'select-menu';
    menu.id = menuId;
    menu.setAttribute('role', 'listbox');
    menu.setAttribute('aria-labelledby', triggerId);
    menu.hidden = true;

    [...select.options].filter((option) => !option.disabled).forEach((option) => {
        const item = document.createElement('button');

        item.type = 'button';
        item.className = 'select-option';
        item.textContent = option.textContent;
        item.dataset.value = option.value;
        item.setAttribute('role', 'option');

        item.addEventListener('click', () => {
            select.value = option.value;
            select.dispatchEvent(new Event('change', { bubbles: true }));
            closeAllSelects();
            trigger.focus();
        });

        menu.append(item);
    });

    const syncSelection = () => {
        const selected = select.options[select.selectedIndex];

        value.textContent = selected.textContent;
        menu.querySelectorAll('.select-option').forEach((item) => {
            item.setAttribute('aria-selected', String(item.dataset.value === select.value));
        });
    };

    const openMenu = () => {
        closeAllSelects();
        trigger.setAttribute('aria-expanded', 'true');
        menu.hidden = false;
        (menu.querySelector('[aria-selected="true"]') || menu.querySelector('.select-option'))?.focus();
    };

    trigger.addEventListener('click', () => {
        if (trigger.getAttribute('aria-expanded') === 'true') {
            closeAllSelects();
            return;
        }

        openMenu();
    });

    trigger.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
            event.preventDefault();
            openMenu();
        }
    });

    menu.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeAllSelects();
            trigger.focus();
        }
    });

    select.addEventListener('change', syncSelection);
    label?.setAttribute('for', triggerId);
    wrapper.append(trigger, menu);
    syncSelection();
});

document.addEventListener('click', (event) => {
    if (!event.target.closest('[data-select]')) {
        closeAllSelects();
    }
});
