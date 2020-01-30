<?php
class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['data'] = $this->dashboard_model->join();
        $data['kondisi'] = $this->db->get('kondisi')->result();
        admin_page('index', $data);
    }
    function action()
    {

        $this->load->model("dashboard_model");

        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Nama Barang", "Merek", "Jumlah Barang", "Baik", "Rusak Ringan", "Berat", "tempat", "sumber", "Nilai Wajar", "total", "% Kondisi");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        $employee_data = $this->dashboard_model->fetch_data();

        $excel_row = 2;

        foreach ($employee_data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->nama_barang);

            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->merek);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, count($this->db->get_where("inventaris", ['nama_barang' => $row->nama_barang, 'id_ruangan' => $row->id_ruangan])->result()));

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="Employee Data.xls"');

        $object_writer->save('php://output');
    }
}
