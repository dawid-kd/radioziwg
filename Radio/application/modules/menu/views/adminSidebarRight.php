<?php
$menu = array(
    '' => array(
        'name' => 'Panel kontrolny',
        'items' => array(
            'settings' => 'ustawienia',
        ),
    ),
    'separator',
    'exams' => array(
        'name' => 'Egzaminy',
        'items' => array(
            'teachers' => 'terminy',
        ),
    ),
    'schools' => array(
        'name' => 'Uczelnie',
        'items' => array(
            'teachers' => 'nauczyciele',
            'subjects' => 'przedmioty',
        ),
    ),
    'separator',
    'users' => array(
        'name' => 'Użytkownicy',
        'items' => array(
//            'newsletter' => 'korespondencja',
        ),
    ),
);
?>
<td id="sidebar">
    <ul class="listFirst">
        <? foreach ($menu as $key1 => $pos1): ?>
            <? if (is_numeric($key1)): ?>
                <li>&nbsp;</li>
            <? else: ?>
                <li<? if ($this->uri->segment(2) == $key1 && !in_array($this->uri->segment(3), (isset($pos1['items']) ? array_keys($pos1['items']) : array()))): ?> class="active"<? endif; ?>>
                    <a href="<?= base_url('admin/' . $key1) ?>"><?= $pos1['name'] ?></a>
                    <? if (isset($pos1['items']) && $this->uri->segment(2) == $key1): ?>
                        <ul class="listSecond">
                            <? foreach ($pos1['items'] as $key2 => $pos2): ?>
                                <li<? if ($this->uri->segment(3) == $key2 || ($key1 == '' && $key2 != '')): ?> class="active"<? endif; ?>>
                                    <a href="<?= base_url('admin/' . ($key1 != '' ? $key1 . '/' . $key2 : $key2)) ?>"><?= $pos2 ?></a>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
</td>