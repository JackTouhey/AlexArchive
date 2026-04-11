<?php
 enum STATUS_ID: int {
    case Finished = 1;
    case In_Progress = 2;
    case DNF = 3;

    public function getDisplayString(): string {
        return match($this){
            self::Finished => 'Finished',
            self::In_Progress => 'In Progress',
            self:: DNF => 'DNF',
        };
    }

    public static function getDisplayFromInt(int $idInt): string {
        return match($idInt){
            self::Finished->value => 'Finished',
            self::In_Progress->value => 'In Progress',
            self::DNF->value => 'DNF',
            default => 'Error getting status',
        };
    }
}
?>