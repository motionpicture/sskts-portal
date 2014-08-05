<?php
class Pager {
	private $total;
	private $num_per_page;
	private $cur_no;
	private $first_no;
	private $last_no;
	private $next_no;
	private $prev_no;
	private $query = array();
	private $no;

	function Pager($params) {
		$total        = $params['total'];
		$num_per_page = $params['num_per_page'];
		$cur_no       = $params['cur_no'];
		$path         = isset($params['path']) ? $params['path'] : '';
		$query        = isset($params['query']) ? $params['query'] : array();

		$first_no = 1;
		$last_no  = ceil($total / $num_per_page);
		$next_no  = $cur_no < $last_no  ? $cur_no + 1 : null;
		$prev_no  = $cur_no > $first_no ? $cur_no - 1 : null;
		$all_nos  = array();
		for ($i = $first_no; $i <= $last_no; $i++) {
			$all_nos[] = $i;
		}
		$this->total        = $total;
		$this->num_per_page = $num_per_page;
		$this->cur_no       = $cur_no;
		$this->first_no     = $first_no;
		$this->last_no      = $last_no;
		$this->next_no      = $next_no;
		$this->prev_no      = $prev_no;
		$this->all_nos      = $all_nos;
		$this->path         = $path;
		$this->query        = $query;
		$this->no           = $cur_no;
	}

	function all() {
		$buf = array();
		$all_nos = $this->all_nos;
		foreach ($all_nos as $no) {
			$buf[] = new Pager(array(
                'cur_no'       => $no,
                'total'        => $this->total,
                'num_per_page' => $this->num_per_page,
                'path'         => $this->path,
                'query'        => $this->query
			));
		}
		return $buf;
	}

	function cur() {
		$this->no = $this->cur_no;
		return $this;
	}

	function total() {
		return $this->total;
	}

	function first() {
	$this->no = $this->first_no;
	return $this;
	}

	function last() {
	$this->no = $this->last_no;
		return $this;
	}

		function next() {
		$this->no = $this->next_no;
		return $this;
		}

			function prev() {
			$this->no = $this->prev_no;
			return $this;
}

			function no() {
			return $this->cur_no;
			}

			function firstIndex() {
			$idx = $this->num_per_page * ($this->no - 1) + 1;
			if ($idx > $this->total) $idx = $this->total;
			return $idx;
			}

			function lastIndex() {
			$idx = $this->num_per_page * $this->no;
			if ($idx > $this->total) $idx = $this->total;
			return $idx;
			}

			function url($ssl = false) {
			if (!$this->no) return '';
			$url_info = parse_url($this->path);
			if ($ssl) $url_info['scheme'] = 'https';
				$query = array();
				if (isset($url_info['query']) && $url_info['query'] != '') {
				parse_str($url_info['query'], $query);
			}
			$query = array_merge($query, $this->query);
			$query['no'] = $this->no;
			$buf = array();
			foreach ($query as $k => $v) {
			$buf[] = sprintf('%s=%s', urlencode($k), urlencode($v));
			}
			$url_info['query'] = join('&', $buf);
			if (isset($url_info['scheme']) &&isset($url_info['host']) ) {
				$url = sprintf('%s://%s%s%s%s',
				$url_info['scheme'],
				$url_info['host'],
                        $url_info['path'],
                        $url_info['query'] ? '?' . $url_info['query'] : '',
                        isset($url_info['fragment']) && $url_info['fragment'] != '' ? '#' . $url_info['fragment'] : ''
				);
				} else {
				$url = sprintf('%s%s%s',
				$url_info['path'],
				$url_info['query'] ? '?' . $url_info['query'] : '',
				isset($url_info['fragment']) && $url_info['fragment'] != '' ? '#' . $url_info['fragment'] : ''
                    );
                        }
                        	return $url;
                        }

    function __toString() {
                        	return (string) $this->no;
    }
                        }

?>