<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    protected $DBGroup = 'default';

    /* =======================
     * Get Records
     * ======================= */
    public function get_all_records(
        $table,
        $where = [],
        $single = false,
        $select = '*',
        $orderBy = []
    ) {
        $builder = $this->db->table($table)->select($select);

        if (!empty($where)) {
            $builder->where($where);
        }

        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $builder->orderBy($column, $direction);
            }
        }

        $query = $builder->get();

        return $single
            ? $query->getRowArray()
            : $query->getResultArray();
    }

    /* =======================
     * Insert Data
     * ======================= */
    public function insert_data($table, $data)
    {
        $this->db->table($table)->insert($data);
        return $this->db->insertID();
    }

    /* =======================
     * Update Data
     * ======================= */
    public function update_data($table, $where = [], $data = [])
    {
        if (!empty($where)) {
            return $this->db->table($table)->where($where)->update($data);
        }

        // Allow bulk update (used in products hide/show)
        return $this->db->table($table)->update($data);
    }

    /* =======================
     * Count Records
     * ======================= */
    public function counts($table, $where = [])
    {
        $builder = $this->db->table($table);

        if (!empty($where)) {
            $builder->where($where);
        }

        return $builder->countAllResults();
    }
}
